<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //show register create form
    public function create(){
        return view('users.register');
    }
    //store new user
    public function store(Request $request){
        $formField = $request->validate([
            'name'=> 'required',
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>'required|confirmed| min:6'
            
        ]);
    $users = User::create($formField);
    
    auth()->login($users);//direct log in
    return redirect('product/index');
    }

    //log out
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('product/index')->with('message','You have been logged out');
    }
    //log in
    public function login(){
        return view('users/login');
    }
    //for log in user (this is not working)
    public function authenticate(Request $request){
        $formField = $request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);
        if(auth()->attempt($formField)){
            $request->session()->regenerate();

            return redirect('product/index')->with('message','You are logged in');
        }
        return redirect('product/index')->withErrors(['email'=> 'Invalid Credentials'])->onlyInput('email');
    }
}
