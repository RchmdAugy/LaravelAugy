<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_user extends Controller
{
    public function index(){
        return view('v_user');
    }
}
