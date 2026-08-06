<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permit;

class PermitController extends Controller
{
    public function index()
    {
        $permits = Permit::all();
        return view('admin.permit_index', compact('permits'));
    }

    public function create()
    {
        return view('admin.permit_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string',
            'owner' => 'required|string',
            'status' => 'required|string',
        ]);

        Permit::create($request->all());
        return redirect()->route('admin.permit.index')->with('success', 'Permit registered successfully!');
    }

    public function edit(Permit $permit)
    {
        return view('admin.permit_edit', compact('permit'));
    }

    public function update(Request $request, Permit $permit)
    {
        $request->validate([
            'business_name' => 'required|string',
            'owner' => 'required|string',
            'status' => 'required|string|in:active,pending,expired',
        ]);

        $permit->update($request->only(['business_name','owner','status']));

        return redirect()->route('admin.permit.index')->with('success', 'Permit updated successfully!');
    }

    public function destroy(Permit $permit)
    {
        $permit->delete();
        return redirect()->route('admin.permit.index')->with('success', 'Permit deleted successfully!');
    }
}
