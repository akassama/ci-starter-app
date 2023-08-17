<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        return view('front-end/home/index');
    }
}
