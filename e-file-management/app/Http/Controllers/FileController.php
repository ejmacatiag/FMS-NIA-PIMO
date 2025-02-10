<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = File::all();
        $folders = Folder::all();
        return view('file.index', compact('files', 'folders'));
    }

    public function create()
    {
        $folders = Folder::all();
        return view('file.create', compact('folders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ia_name' => 'required|string|max:255',
            'project_name' => 'required|string|max:255',
            'folder_id' => 'required|exists:folders,id',
            'date_received' => 'required|date',
            'file' => 'required|file|mimes:jpg,png,pdf,docx,txt',
        ]);

        $filePath = $request->file('file')->store('files');


        $fileType = $request->file('file')->getClientOriginalExtension();

        File::create([
            'ia_name' => $request->ia_name,
            'project_name' => $request->project_name,
            'folder_id' => $request->folder_id,
            'file_type' => $fileType,
            'date_received' => $request->date_received,
            'file_path' => $filePath,
        ]);

        return redirect()->route('file.index')->with('success', 'File uploaded successfully!');
    }


    public function edit(File $file)
    {
        $folders = Folder::all();
        return view('file.edit', compact('file', 'folders'));
    }

    public function update(Request $request, File $file)
    {
        $request->validate([
            'file_name' => 'required|string|max:255',
            'folder_id' => 'required|exists:folders,id',
        ]);

        $file->update([
            'file_name' => $request->file_name,
            'folder_id' => $request->folder_id,
        ]);

        return redirect()->route('files.index')->with('success', 'File updated successfully!');
    }

    public function destroy(File $file)
    {
        if (Storage::disk('public')->exists($file->file_path)) {
            Storage::disk('public')->delete($file->file_path);
        }
        $file->delete();
        return redirect()->route('files.index')->with('success', 'File deleted successfully!');
    }
}
