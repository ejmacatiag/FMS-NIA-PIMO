@extends('layouts.app')

@section('main-content')
<div class="container">
    <h1>Manage Files</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFileModal">Add File</button>

    <!-- Files List -->
    <div class="mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>File Name</th>
                    <th>Folder</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example File Entries -->
                @foreach($files as $file)
                    <tr>
                        <td>{{ $file->file_name }}</td>
                        <td>{{ $file->folder->folder_name }}</td>
                        <td>
                            <a href="{{ route('file.edit', $file->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('file.destroy', $file->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add File Modal -->
<div class="modal fade" id="addFileModal" tabindex="-1" aria-labelledby="addFileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFileModalLabel">Add File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file_name" class="form-label">File Name</label>
                        <input type="text" class="form-control" name="file_name" id="file_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="folder_id" class="form-label">Select Folder</label>
                        <select class="form-select" name="folder_id" id="folder_id" required>
                            @foreach($folders as $folder)
                                <option value="{{ $folder->id }}">{{ $folder->folder_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">File Upload</label>
                        <input type="file" class="form-control" name="file" id="file" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload File</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
