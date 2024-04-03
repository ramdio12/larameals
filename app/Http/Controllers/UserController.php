<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function register()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()]
        ]);

        // hash password

        $fields['password'] = bcrypt($fields['password']);

        $user = User::create($fields);

        // login
        auth()->login($user);
        return redirect('/')->with('message', 'Account created successfully');
    }

    public function userprofile(Request $request)
    {
        return view('users.profile', ['profile' => $request]);
    }
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }


    public function update(Request $request)
    {



        // $request->validate([
        //     'name' => 'required|min:4',
        //     'email' => 'required|email',
        //     'description' => 'min:10',
        //     'photo' => 'image|mimes:jpg,png,jpeg|max:2048'

        // ]);

        // $user->name = $request['name'];
        // $user->email = $request['email'];
        // $user->introduction = $request['introduction'];
        // $user->photo = $request['photo'];



        // if ($request->hasFile('photo')) {
        //     $request['photo']  = $request->file('photo')->store('profilephotos', 'public');
        // }


        // $user->save();
        // return back()->with('message', 'Profile Updated');

        // $fields = $request->validate([
        //     'name' => ['required', 'min:3'],
        //     'email' => 'required',
        //     'introduction' => 'min:10',
        //     'photo' => 'image|mimes:jpg,png,jpeg|max:2048'
        // ]);




        // // Add password validation only if it's being updated
        // if ($request->filled('password')) {
        //     $fields['current_password'] = 'required|string';
        //     $fields['password'] = 'nullable|string|min:8|confirmed';
        // }


        // // Check if the current password matches if it's provided and if password is being updated
        // if ($request->filled('current_password') && !Hash::check($request->current_password, $user->password)) {
        //     return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        // }


        // if ($request->hasFile('photo')) {
        //     $fields['photo']  = $request->file('photo')->store('profilephotos', 'public');
        // }

        // // Update user
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->introduction = $request->introduction;
        // $user->photo = $request->photo;
        // if ($request->filled('password')) {
        //     $user->password = bcrypt($request->password);
        // }

        // $user->save();


        $user = Auth::user();

        $fields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'introduction' => 'min:10',
            'photo' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $user->name = $fields['name'];
        $user->email = $fields['email'];
        $user->introduction = $fields['introduction'];

        if ($request->hasFile('photo')) {
            $fields['photo']  = $request->file('photo')->store('profilephotos', 'public');
            $user->update(['photo' => $fields['photo']]);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'introduction' => $request->introduction
        ]);

        return back()->with('message', 'Profile Updated Successfully');
    }





    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $fields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ]);

        if (auth()->attempt($fields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Logged in successfully');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request)
    {

        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logged out successfully');
    }
}
