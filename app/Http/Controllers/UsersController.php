<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
    //
    public function __construct(){
        //中间件，权限限制，非登陆用户不能访问个人页，except = 排除
        $this->middleware('auth',[
            'except' => ['show', 'create', 'store']
        ]);

        //未登陆才能访问登陆页
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }


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
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        //保存
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" =>  bcrypt($request->password),
        ]);

        Auth::login($user);
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('users.show', [$user]);
    }

    //编辑
    public function edit(User $user){
        $this->authorize('update', $user);
        return view('users.edit',compact('user'));
    }

    //更新
    public function update(User $user, Request $request){
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'nullable|confirmed|min:6'
        ]);

        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('users.show', $user);
    }

}
