@extends('layouts.app')

@section('content')
    <h1>Calculate Fee</h1>
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
    
    <form action="{{ route('fee_percentages.store') }}" method="POST">
        @csrf
        <div>
            <label for="fee_preset_id"><b>Fee Preset:</b></label>
            <select name="fee_preset_id" required>
                @foreach ($feePresets as $preset)
                    <option value="{{ $preset->id }}">{{ $preset->name }}</option>
                @endforeach
            </select>
        </div>
        <br><br><br><br>
        <div>
            <label for="service_id"><b>Service:</b></label>
            <select name="service_id" required>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        <br><br><br><br>
        <div>
            <label for="threshold_amount"><b>Amount:</b></label>
            <input type="number" name="threshold_amount" id="threshold_amount" required min="0" step="any">
        </div>
        <br><br><br>
        <button type="submit">Calculate</button>
    </form>
@endsection
