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

    public function store(Request $request){
        //验证
        $this->validate($request,[
            'name' => 'required|unique:users|max:50',
            'email' => 'required|email|unique:users|max:252',
            'password' => 'required|confiremd|min:6',
        ]);

        return ;
    }

}
