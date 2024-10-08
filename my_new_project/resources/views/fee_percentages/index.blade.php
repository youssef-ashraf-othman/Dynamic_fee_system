@extends('layouts.app')

@section('content')
    <style>
        .button {
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
        a {
            color: #007BFF; /* Default link color */
            text-decoration: none; /* Remove underline */
            font-weight: bold; /* Make the font bold */
            font-size: 35px; /* Enlarged font size for links */
        }
        table {
            border-collapse: separate; /* Allows border-spacing to work */
            border-spacing: 10px; /* Distance between columns and rows */
            width: 100%; /* Set table width */
            margin: 20px 0; /* Margin around the table */
        }
        th, td {
            border: 1px solid #000; /* Border around cells */
            padding: 10px; /* Padding inside cells */
            text-align: left; /* Align text to the left */
        }
        th {
            background-color: #f2f2f2; /* Light grey background for header */
        }
    </style>
    <div class="landing-container">
        <div class="link-container">
            <a href="{{ route('fee_presets.index') }}" class="link-btn">Manage Fee Presets</a>
            <br>
            <a href="{{ route('services.index') }}" class="link-btn">Manage Services</a>
            <br>
            <a href="{{ route('thresholds.index') }}" class="link-btn">Manage Thresholds</a>
            <br>
        </div>
    </div>
    
    <h1>Fee Calculator</h1>
    <a href="{{ route('fee_percentages.create') }}" class="button">Calculate Fee</a>
    <br><br>
    
    @if ($lastFeePercentage)
    <table>
        <thead>
            <tr>
                <th>Fee Preset</th>
                <th>Service</th>
                <th>Percentage</th>
                <th>Fee</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $lastFeePercentage->feePreset->name }}</td><!-- fee preset name-->
                <td>{{ $lastFeePercentage->service->name }}</td><!-- Display service name-->
                <td>{{ $lastFeePercentage->percentage }}%</td><!-- Display fee percentage -->
                <td>{{ $calculatedAmount }}</td> <!-- Display the calculated fee amount -->
            </tr>
        </tbody>
    </table>
    @else
        <p>No transactions available.</p>
    @endif
@endsection