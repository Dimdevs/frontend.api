<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public $view = 'frontend.user.';


    public function index()
    {
        return view($this->view. 'index');
    }
}
