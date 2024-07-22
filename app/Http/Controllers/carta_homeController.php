<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class carta_homeController extends Controller
{
    public function index()
    {
        return view('homecartas');
    }
}
