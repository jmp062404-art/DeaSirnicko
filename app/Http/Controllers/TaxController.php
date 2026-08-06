<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;

class TaxController extends Controller
{
    public function index()
    {
        $taxpayers = Tax::all();
        return view('admin.taxpayer_index', compact('taxpayers'));
    }

    public function create()
    {
        return view('admin.taxpayer_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email|unique:taxes,email',
        ]);

        Tax::create($request->all());
        return redirect()->route('admin.taxpayer.index')->with('success', 'Taxpayer added successfully!');
    }

    public function edit(Tax $taxpayer)
    {
        return view('admin.taxpayer_edit', ['taxpayer' => $taxpayer]);
    }

    public function update(Request $request, Tax $taxpayer)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email|unique:taxes,email,' . $taxpayer->id,
        ]);

        $taxpayer->update($request->only(['name','address','email']));

        return redirect()->route('admin.taxpayer.index')->with('success', 'Taxpayer updated successfully!');
    }

    public function destroy(Tax $taxpayer)
    {
        $taxpayer->delete();
        return redirect()->route('admin.taxpayer.index')->with('success', 'Taxpayer deleted successfully!');
    }
}
