<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLoginForm()
    {
        return view('login-page');  // The login page view (login-page.blade.php)
    }

    public function logrequest(Request $request)
    {
        // Validate the request input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Retrieve the user by username
        $user = UserModel::where('username', $request->username)->first();

        $user = UserModel::where('username', $request->username)->first();
        if ($user) {
            Log::info('User found', ['username' => $user->username]);
        } else {
            Log::error('User not found');
        }
    
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            Log::info('User logged in successfully');
            return redirect()->route('landing');
        } else {
            Log::warning('Invalid credentials provided');
            return back()->withErrors(['Invalid credentials.']);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:user_models,username',
            'password' => 'required|string|min:6',
            'birthday' => 'required|date',
        ]);

        UserModel::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'birthday' => $request->birthday,
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully! Please login.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
