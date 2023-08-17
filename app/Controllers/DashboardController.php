<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        // Load the session library
        $session = session();

        // Get session data
        $data['name'] = $session->get('name');

        return view('back-end/dashboard/index', $data);
    }
}
