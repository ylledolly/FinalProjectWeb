<?php

namespace App\Http\Controllers;

use App\Models\UserLogin;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('login-page');
    }

    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Check user credentials
        $user = UserLogin::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Successful login, store user info in session
            session(['user' => $user->username]);
            return redirect('/landings'); // Redirect to a dashboard or home page
        }

        // Invalid credentials
        return back()->withErrors(['login_error' => 'Invalid username or password.']);
    }
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:user_logins,username',
            'password' => 'required|string|min:6',
            'birthday' => 'required|date',
        ]);

        UserLogin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'birthday' => $request->birthday,
        ]);

        return redirect()->route('login-page')->with('success', 'Account created successfully! Please login.');

    }
}
