<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{    
    public function create()
    {
        return view('register.create');
    }

    /** 
     * Create User 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function store()
    {
        //var_dump(request()->all());
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'min:7', 'max:255']
        ]);       
        
        $user = User::create($attributes);

        auth()->login($user); 
        
        return redirect('/')->with('success','Your account has been created.');
    }


}
