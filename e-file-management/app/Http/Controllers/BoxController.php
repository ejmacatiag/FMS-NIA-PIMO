<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function index()
    {
        $boxes = Box::all();
        return view('box.index', compact('boxes'));
    }

    public function create()
    {
        return view('box.create');
    } 

    public function store(Request $request)
    {
        $request->validate([
            'box_name' => 'required|string|max:255',
            'box_description' => 'nullable|string',
        ]);

        Box::create([
            'box_name' => $request->box_name,
            'box_description' => $request->box_description,
        ]);

        return redirect()->route('boxes.index')->with('success', 'Box added successfully!');
    }

    public function edit(Box $box)
    {
        return view('box.edit', compact('box'));
    }

    public function update(Request $request, Box $box)
    {
        $request->validate([
            'box_name' => 'required|string|max:255',
            'box_description' => 'nullable|string',
        ]);

        $box->update([
            'box_name' => $request->box_name,
            'box_description' => $request->box_description,
        ]);

        return redirect()->route('box.index')->with('success', 'Box updated successfully!');
    }

    public function destroy(Box $box)
    {
        $box->delete();
        return redirect()->route('box.index')->with('success', 'Box deleted successfully!');
    }
}
