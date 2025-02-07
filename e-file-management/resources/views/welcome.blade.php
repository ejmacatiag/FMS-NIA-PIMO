@extends('layouts.app')

@section('main-content')
<div class="container text-center">
    <h1>Welcome to NIA-PIMO Institutional Development Unit File Management System</h1>
    <p>Manage your files with ease!</p>
    <a href="{{ route('boxes.index') }}" class="btn btn-primary">Start Managing Boxes</a>
</div>
@endsection
