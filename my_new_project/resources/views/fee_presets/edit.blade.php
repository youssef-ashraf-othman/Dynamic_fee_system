@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Fee Preset</h1>
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

        <h2>
            Preset Name: {{ $feePreset->name }}
        </h2>

        <form action="{{ route('fee-presets.update',$feePreset -> id) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="name">New Preset Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection
