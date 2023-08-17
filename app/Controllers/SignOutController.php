<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SignOutController extends BaseController
{
    public function index()
    {
        $session = session();
        
        session_destroy();
        return redirect()->to('sign-in');
    }
}
