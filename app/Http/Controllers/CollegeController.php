<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College;

class CollegeController extends Controller
{
    // Show all colleges
    public function index()
    {
        $colleges = College::all()->map(function ($college) {
            $college->course = $this->stringFormatter($college->course);
            $college->collegeName = $this->stringFormatter($college->collegeName);
            return $college;
        });

        return view('college', compact('colleges'));
    }

    // Show create form
    public function create()
    {
        return view('college.create');
    }

    // Store a new college
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course' => 'required|string|max:255',
            'collegeName' => 'required|string|max:255',
        ]);

        College::create($validated);

        return redirect()->route('college.index')->with('success', 'College created successfully!');
    }

    // Formatter
    private function stringFormatter($string)
    {
        return strtoupper($string);
    }
}