<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // Simulated featured books data
        $featuredBooks = [];

        // Generate 12 books dynamically
        for ($i = 1; $i <= 12; $i++) {
            $featuredBooks[] = [
                'id' => $i, // Unique ID for the book
                'title' => "Book Title $i",
                'image' => "assets/img/cover$i.jpg", // Assuming different images for each book
                'rating' => 0, // Default to 0 for unrated books
                'description' => "Description for Book $i. Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio.",
            ];
        }

        return view('LandingPage', compact('featuredBooks'));
    }
}
