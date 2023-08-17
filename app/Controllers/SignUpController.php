<?php

namespace App\Controllers;
use App\Models\UsersModel;

use App\Controllers\BaseController;

class SignUpController extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        return view('front-end/sign-up/index');
    }
    
    public function addRegistration()
    {
        //if not a post request
        if (! $this->request->is('post')) {
            return view('front-end/sign-up/index');
        }

        //set validation rules
        $rules = [
            'first_name' => 'required|max_length[50]|min_length[2]',
            'last_name' => 'required|max_length[50]|min_length[2]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|max_length[255]|min_length[6]',
            'repeat_password' => 'required|matches[password]',
        ];
        
        //if valid
        if($this->validate($rules)){
            $session = session();
            $usersModel = new UsersModel();
            $data = [
                'first_name' => $this->request->getVar('first_name'),
                'last_name'  => $this->request->getVar('last_name'),
                'dob'  => $this->request->getVar('dob'),
                'email'  => $this->request->getVar('email'),
                'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'status' => 0,
                'active' => 0,
            ];
            
            $usersModel->save($data);

            $session->setFlashdata('msg_success', 'Registration successful');

            return redirect()->to('sign-in');
        }else{
            $data['validation'] = $this->validator;
            return view('front-end/sign-up/index');
        } 
    }
}
