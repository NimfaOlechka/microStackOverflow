<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

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

    public function show()
    {
        return view('admin.profile');
    }

    public function editProfile(User $user)
    {
        //$user = Auth::user();
        //ddd($user);
        return view('admin.edit-profile', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {   
        //$path = request()->file('avatar')->store('images');
       /*  
        return 'Done'. $p;
 */
        //ddd(request()->all());
        $current_user = Auth::user();
        $attributes = request()->validate([
            'name' => ['required'],
            'username' => ['required',Rule::unique('users', 'username')->ignore($current_user)],
            'email' => ['required',Rule::unique('users', 'email')->ignore($current_user)],
            'avatar' => ['required']            
            
        ]);

        if($attributes['avatar'] ?? false)
        {            
            $file = request()->file('avatar');            
            $attributes['avatar'] = Storage::putFile('avatars',$file);
        }        
        
        // Update user
        $current_user->update($attributes);
        return back()
            ->with('success', 'User data updated successfully'); 
        
    }

    public function savePic()
    {
        $path = request()->file('avatar')->store('images');
        
        return 'Done';
    }


}
