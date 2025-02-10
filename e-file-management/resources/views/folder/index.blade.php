@extends('layouts.app')

@section('main-content')
<div class="container">
    <h1>Manage Folders</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFolderModal">Add Folder</button>

    <!-- Folders List -->
    <div class="mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>Folder Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Folder Entries -->
                @foreach($folders as $folder)
                    <tr>
                        <td>{{ $folder->folder_name }}</td>
                        <td>
                            <a href="{{ route('folders.edit', $folder->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('folders.destroy', $folder->id) }}" method="POST" style="display:inline;">
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

<!-- Add Folder Modal -->
<div class="modal fade" id="addFolderModal" tabindex="-1" aria-labelledby="addFolderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFolderModalLabel">Add Folder</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('folders.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="folder_name" class="form-label">Folder Name</label>
                        <input type="text" class="form-control" name="folder_name" id="folder_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="box_id" class="form-label">Select Box</label>
                        <select class="form-select" name="box_id" id="box_id" required>
                            @foreach($boxes as $box)
                                <option value="{{ $box->id }}">{{ $box->box_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Folder</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
