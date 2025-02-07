
@extends('layouts.app')
@section('content')
    <h2>Manage Boxes</h2>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addBoxModal">+ Add Box</button>
    <div class="modal fade" id="addBoxModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Box</h5>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('boxes.store') }}">
                        @csrf
                        <input type="text" name="box_name" class="form-control" placeholder="Box Name">
                        <textarea name="box_description" class="form-control mt-2" placeholder="Box Description"></textarea>
                        <button type="submit" class="btn btn-success mt-2">Add Box</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection