<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
 
    public function showRegistrationForm()
    {
        return view('user.registration');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:userss',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:userss',
            'gender' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        $user = new User();
        $user->username = $request->input('username');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        $user->password = Hash::make($request->input('password'));
        $user->favourite_colours = implode(', ', $request->input('favourite_colours', []));
        $user->save();

        return redirect()->route('login.form')->with('success', 'User registered successfully!');
    }

    public function showLoginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $input = $request->only('username', 'password');

        $field = filter_var($input['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $field => $input['username'],
            'password' => $input['password'],
        ];

        if (auth()->attempt($credentials)) {
            return redirect()->route('user.management');
        }

        return back()->withErrors([
            'username' => 'Invalid credentials.',
        ]);
    }


    public function userManagement()
    {
        $users = User::all();

        return view('user.user_management', compact('users'));
    }

    public function showEditForm(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|unique:userss,username,' . $user->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:userss,email,' . $user->id,
            'gender' => 'required',
            'password' => 'nullable|min:6',
            'confirm_password' => 'nullable|same:password',
        ]);

        $user->username = $request->input('username');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->favourite_colours = implode(', ', $request->input('favourite_colours', []));
        $user->save();

        return redirect()->route('user.management')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.management')->with('success', 'User deleted successfully!');
    }
}
