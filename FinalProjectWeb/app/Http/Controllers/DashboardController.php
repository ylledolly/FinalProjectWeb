<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  // Make sure to import the User model

class DashboardController extends Controller
{
    
    public function index()
    {
        return view('dashboard'); // Assumes a dashboard.blade.php exists in resources/views
    }
    public function show($userId)
    {
        return view('dashboard', ['userId' => $userId]); // No 'user.' prefix needed
    }
    
}
