<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  // Make sure to import the User model

class FeedController extends Controller
{
    
    public function index()
    {
        return view('lib'); 
    }
    public function show($userId)
    {
        return view('lib', ['userId' => $userId]); 
    }
    
}