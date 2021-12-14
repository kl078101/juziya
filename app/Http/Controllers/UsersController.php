<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //
    public function create(){
        return view('users.create');
    }

    //用户个人页
    public function show(User $user){
        return view('users.show',compact('user'));
    }

}
