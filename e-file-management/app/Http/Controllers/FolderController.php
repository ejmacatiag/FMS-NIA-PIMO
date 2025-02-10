<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Box;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function index()
    {
        $folders = Folder::all();
        $boxes = Box::all();

        return view('folder.index', compact('folders', 'boxes'));
    }

    public function create()
    {
        $boxes = Box::all();
        return view('folder.create', compact('boxes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'folder_name' => 'required|string|max:255',
            'box_id' => 'required|exists:boxes,id',
        ]);

        Folder::create([
            'folder_name' => $request->folder_name,
            'box_id' => $request->box_id,
        ]);

        return redirect()->route('folders.index')->with('success', 'Folder added successfully!');
    }

    public function edit(Folder $folder)
    {
        $boxes = Box::all();
        return view('folder.edit', compact('folder', 'boxes'));
    }

    public function update(Request $request, Folder $folder)
    {
        $request->validate([
            'folder_name' => 'required|string|max:255',
            'box_id' => 'required|exists:boxes,id',
        ]);

        $folder->update([
            'folder_name' => $request->folder_name,
            'box_id' => $request->box_id,
        ]);

        return redirect()->route('folders.index')->with('success', 'Folder updated successfully!');
    }

    public function destroy(Folder $folder)
    {
        $folder->delete();
        return redirect()->route('folders.index')->with('success', 'Folder deleted successfully!');
    }
}
