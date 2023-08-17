<?php

namespace App\Controllers;
use App\Models\UsersModel;

use App\Controllers\BaseController;

class SignInController extends BaseController
{
    protected $helpers = ['form'];
    
    public function index()
    {
        return view('front-end/sign-in/index');
    }

    public function processLogin()
    {
        //if not a post request
        if (! $this->request->is('post')) {
            return view('front-end/sign-in/index');
        }

        $session = session();
        $userModel = new UsersModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            $status = $data['status'];
            $active = $data['active'];

            //if not activated
            if($status == 0 || $active == 0){
                $session->setFlashdata('msg_danger', 'Your account has not been activated yet or is no longer active. Please contact the administrator.');
                return redirect()->to('sign-in');
            }

            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'user_id' => $data['id'],
                    'name' => $data['first_name']." ".$data['last_name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('admin/dashboard');
            
            }else{
                $session->setFlashdata('msg_danger', 'Sign In Failed. The provided username or password is incorrect. (Password)');
                return redirect()->to('sign-in');
            }
        }else{
            $session->setFlashdata('msg_danger', 'Sign In Failed. The provided username or password is incorrect. (Email)');
            return redirect()->to('sign-in');
        }

    }
}
