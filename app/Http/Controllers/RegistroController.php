<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function registro()
    {
        return view('/resources/views/auth/registro.blade.php');
    }
}
