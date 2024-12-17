<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Landing;  

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $popularBooks = Landing::all(); 
        // Add dynamic asset path (Assets 1, Assets 2, etc.)
        foreach ($popularBooks as $index => $book) {
            // Dynamically build the asset image path based on the book index (1, 2, 3, etc.)
            $book->image_url = asset('assets/img/Asset ' . ($index + 1) . '.png');
        }

        return view('LandingPage', compact('popularBooks'));
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
