@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Service</h1>
        <style>
        button {
            display: inline-block; /* Allows padding and margin */
            padding: 10px 20px; /* Top/bottom and left/right padding */
            font-size: 18px; /* Font size */
            color: #fff; /* Text color */
            background-color: #007BFF; /* Background color */
            text-decoration: none; /* Remove underline */
            border-radius: 5px; /* Rounded corners */
            border: none; /* Remove border */
            transition: background-color 0.3s; /* Smooth transition */
        }
    </style>

        <form action="{{ route('services.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Service Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
@endsection
