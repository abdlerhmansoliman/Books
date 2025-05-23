<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Status;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => ['required', 'string', 'max:255'],

        ]);
    
        $user = User::create([
            'name' => $request->name,
            'bio' => $request->bio,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->roles()->attach(Role::where('role', 'user')->value('id'));
        $user->statuse()->attach(Status::where('name','active')->value('id'));
        
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('avatars', 'public');
            
            $user->uploads()->create([
                'type' => 'profile_image',
                'path' => $imagePath,
                'size' => $request->file('profile_image')->getSize(),
            ]);
        }
    
        event(new Registered($user));
        Auth::login($user);
    
        return redirect()->route('home');
    }
    
    
}
