<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use App\Models\Box;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = File::with('folder')->get(); 
        $folders = Folder::all();
        
        return view('file.index', compact('files', 'folders'));
    }

    public function create()
    {
        $boxes = Box::all(); // Ensure Box model is imported
        $folders = Folder::all();
        return view('file.create', compact('boxes', 'folders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ia_name' => 'required',
            'project_name' => 'required',
            'folder_id' => 'required|exists:folders,id',
            'date_received' => 'required|date',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,png',
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads', 'public');
        $fileType = $file->getClientOriginalExtension(); // Extract file type

        File::create([
            'ia_name' => $request->ia_name,
            'project_name' => $request->project_name,
            'folder_id' => $request->folder_id,
            'file_type' => $fileType,
            'date_received' => $request->date_received,
            'file_path' => $path,
        ]);

        return redirect()->route('files.index')->with('success', 'File uploaded successfully.');
    }

    public function edit(File $file)
    {
        $boxes = Box::all();
        $folders = Folder::all();
        return view('file.edit', compact('file', 'boxes', 'folders'));
    }

    public function update(Request $request, File $file)
    {
        $request->validate([
            'folder_id' => 'required|exists:folders,id',
        ]);

        $file->update([
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
