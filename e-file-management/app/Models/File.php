<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileController extends Controller {
    public function store(Request $request) {
        $request->validate([
            'ia_name' => 'required',
            'project_name' => 'required',
            'folder_id' => 'required|exists:folders,id',
            'file_type' => 'required',
            'date_received' => 'required|date',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,png',
        ]);

        $path = $request->file('file')->store('uploads', 'public');

        File::create([  
            'ia_name' => $request->ia_name,
            'project_name' => $request->project_name,
            'folder_id' => $request->folder_id,
            'file_type' => $request->file_type,
            'date_received' => $request->date_received,
            'file_path' => $path,
        ]);

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
}

