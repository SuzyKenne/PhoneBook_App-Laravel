@extends('layouts.app')

@section('content')
    <h1>Contacts</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Display your contacts here -->
@endsection