@extends('layouts.app')

@section('content')
    <style>
        .landing-container {
            text-align: center;
            margin: 50px;
        }

        .link-container {
            margin-top: 20px;
        }

        .link-btn {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 15px 25px;
            margin: 10px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .link-btn:hover {
            background-color: #0056b3;
        }

    </style>
    <div class="landing-container">
        <h1>Welcome to the Dynamic Fee Structure System</h1>
        <p>Select an option below to proceed:</p>
        <div class="link-container">
            <a href="{{ route('fee_percentages.create') }}" class="link-btn">Get Started</a>
            
        </div>
    </div>
@endsection
