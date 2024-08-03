<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // login view
    public function login(){
        return view('auth.login');
    }

    // login process
    public function authenticate(Request $request){
        $credentials =$request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            if(Auth::user()->status != 'active'){
                Auth::logout();
                $message = $user->status == 'banned' 
                    ? 'Your account has been banned. Please contact admin!'
                    : 'Account is not activated yet, please contact admin!';
                return redirect('login')->with('loginError', $message);
            }

            $request->session()->regenerate();

            if(Auth::user()->role_id == 1){
                return redirect('/dashboard');
            }
            if(Auth::user()->role_id == 2){
                return redirect('/profile');
            }

            // return redirect()->intended('/profile');
        }
        return back()->with('loginError', 'Login Failed!');
    }

    // register view
    public function register(){
        return view('auth.register');
    }

    // register process
    public function store(Request $request){
        $credentials = $request->validate([
            'username' => 'bail|required|unique:users|max:255',
            'email' => 'bail|required|unique:users|email',
            'phone' => '',
            'address' => 'required',
            'password' => 'required|min:6'
        ]); 
        $credentials['password'] = Hash::make($credentials['password']);
        $credentials['role_id'] = 2;

        User::create($credentials);

        return redirect('/login')->with('success', "Registration success! Please login");
    }

    // logout
    public function logout(){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
