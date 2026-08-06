<?php

namespace App\Http\Controllers;

use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category')->get();
        return view('items.index', compact('items'));
    }
}
