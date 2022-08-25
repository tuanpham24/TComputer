<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
// use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    //
    function showFormRegister(){
        return view('client.auth.user-register');
    }

    function register(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        $user->password =$request->password;
        $user->status = true;
        $user->save();

        // $user['name'] = $request->name;
        // $user['email'] = $request->email;
        // $user['password'] = $request->password;
        // $user['status'] = true;
        // User::create($user);

        return redirect() -> route('user.show-form-regis') -> with('status', 'Register successfully!');
    }

    function showFormLogin(){
        return view('client..auth.user-login');
    }

    // public function getLogin()
    // {
    //     if (Auth::check()) {
    //         // nếu đăng nhập thàng công thì 
    //         return redirect('home');
    //     } else {
    //         return view('client.auth.user-login');
    //     }

    // }
    // public function postLogin(LoginRequest $request)
    // {
    //     $login = [
    //         'email' => $request->email,
    //         'password' => $request->password,
    //         'level' => 1,
    //         'status' => 1
    //     ];
    //     if (Auth::attempt($login)) {
    //         return redirect('home');
    //     } else {
    //         return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
    //     }
    // }

    function login(Request $request){
        $email = $request -> input('email');
        $password = $request -> input('password');
        
        $user_auth = User::where('email', '=', $email)->where('password', '=', $password)->get()->first();
        if($user_auth == NULL){
            return redirect() -> route('user.show-form-login') -> with('status', 'Email or Password is not correct');
        }
        Cookie::queue('user_name', $user_auth->name, 10);
        $user_name_cookie = Cookie::get('user_name');
        return redirect() -> route('home') -> with(compact('user_auth'));
        // return redirect() -> route('home') -> with(compact('user_name_cookie' ));
        // return view('client.products.products-list', compact('user_auth'));
    }

    function logout(){
        // Cookie::forget('user_name');
        Cookie::queue(Cookie::forget('user_name'));
        return redirect() -> route('home');
    }

}

