<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

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

    public function edit(Request $request)
    {   
        $current_user = Auth::user();
        $attributes = $request->validate([
            'name' => ['required|max:255'],
            'username' => ['required',Rule::unique('posts', 'slug')->ignore($current_user)],
            'email' => ['required',Rule::unique('users', 'email')->ignore($current_user)],
            'avatar' => ['mimes:jpeg, jpg, png, gif', 'max:2048']            
            
        ]);

        /* if($request->avatar ?? false)
        {
            $attributes['avatar'] = request()->file('avatar')->store('avatar')
        } */

        /* // Upload avatar
        if (isset($request->avatar)) {
            $imageName = md5(time()) . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('images/avatars'), $imageName);
            $current_user->avatar = $imageName;
        }
        // Update user
        $current_user->update();
        return redirect('dashboard/profile')
            ->with('success', 'User data updated successfully');
 */
        
    }


}
