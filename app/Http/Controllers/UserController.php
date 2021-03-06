<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    function __construct()
    {
        $this->middleware('guest')->only('login','index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Requests\UserLoginRequest $request)
    {

       if(\Auth::attempt([
           'email'=>$request->get('email'),
           'password'=>$request->get('password'),
           //confirm 验证邮箱在这
       ])){

           return redirect('/discussion');
       };
       session()->flash('status','账号或者密码错误，请重新登录！！');
        return redirect('/user/login')->withInput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserRegisterRequest $request)
    {
        $data=array_merge($request->except('password_confirmation'),['avatar'=>asset('/image/default.jpg')]);
        User::create($data);
        session()->flash('msg','注册成功 开心⸂⸂⸜(രᴗര๑)⸝⸃⸃ ⸂⸂⸜(രᴗര๑)⸝⸃⸃  请登录');
        return redirect('/user/login');
    }

    public function register()
    {
        return view('user.register');
    }
    public function login()
    {
        return view('user.login');
    }

    public function logout()
    {

        session()->flush();
        session()->regenerate();
        auth()->logout();
        return redirect('/discussion');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
