<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function registerUser(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required|min:6',
        ]); 
        if($validate->fails()) return redirect()->back()->withInput()->withErrors($validate);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        
        return redirect('/')->with(['message' => 'Berhasil Registrasi']);
    }
    public function loginUser(Request $request){
        $credentials = $request->validate([ 
            'username' => 'required',
            'password' => 'required',
        ]);  
        if(Auth::attempt($credentials)){
            if(Auth::user()->user_type == 0){
                $request->session()->regenerate();
                
                return redirect()->intended('dashboard');
            }else if(Auth::user()->user_type == 1){
                $request->session()->regenerate();
                
                return redirect()->intended('admin');
            }
        }
        return redirect()->back()->withInput()->withErrors(['message' => 'The provided credentials do not match our records.']);
    }
    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
