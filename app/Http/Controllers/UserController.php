<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{

    public function homepage(){
        return view('homepage');
     }
    
     
    public function register(Request $request)
    {
        $incoming = $request->validate([
            'username'=>['required','min:3','max:20',Rule::unique('users','username')],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','min:6','confirmed'],
        ]);

        User::create($incoming);
        return view('single-post');
    }
    public function login(Request $request)
    {
        $incoming = $request->validate([
            'loginusername' => ['required'],
            'loginpassword' => ['required'],
        ]);
    
        if (auth()->attempt(['username' => $incoming['loginusername'], 'password' => $incoming['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/');
        } else {
            return redirect('/');
        }
    }
    
    public function feed(Request $request)
    {
       if(auth()->check()){
        return view('homepage-feed');

       }else{
        return view('homepage');

       }
       
    }
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/');
    }
       
}
