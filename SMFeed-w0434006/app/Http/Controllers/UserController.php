<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view('user_folder.user');
    }

    public function store(){
        $data = request()->validate([

        ]);
    }
}
