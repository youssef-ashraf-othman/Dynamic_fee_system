@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Threshold</h1>
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

        <form action="{{ route('thresholds.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="amount">Threshold amount</label>
                <input type="number" name="amount" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
