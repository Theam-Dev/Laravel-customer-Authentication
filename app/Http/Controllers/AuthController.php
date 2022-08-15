<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Hash;
use Session;
class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function postregister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        if($user){
            $request ->session()->put('loginId',$user->id);
            return redirect()->route('dashboard');
        }
        return back()->with('fail','Something was wrong');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::where('email','=',$request->email)->first();
            $request ->session()->put('loginId',$user->id);
            return redirect()->route('dashboard');
        }
        return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    }
    public function logout() {
        Auth::logout();
        return redirect('login');
    }
}
