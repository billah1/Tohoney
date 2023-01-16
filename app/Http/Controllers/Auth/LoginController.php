<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginpage(){
        return view('Backend.pages.auth.login');
    }

    public function login(Request $request){
        $validated = $request->validate([
            'email' =>'required|email',
            'password'=>'required|string|min:4'
        ]);
        $credentials = [
            'email' =>$request->email,
            'password' =>$request->password,
        ];
        if(Auth::attempt($credentials,$request->filled('remember'))){
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');

        }
        return back()->withErrors([
            'email'=>'wrong credentails found!'
        ])->onlyInput('email');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
