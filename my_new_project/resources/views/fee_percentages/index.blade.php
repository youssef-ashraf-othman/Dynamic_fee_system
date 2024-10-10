@extends('layouts.app')

@section('content')

    <h1>Fee Calculator</h1>
    <a href="{{ route('fee_percentages.create') }}" class="button">Calculate Fee</a>
    <br><br>
    
    @if ($lastFeePercentage)
        @if($calculatedAmount!=0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="equal-width text-center">Fee Preset</th>
                        <th class="equal-width text-center">Service</th>
                        <th class="equal-width text-center">Fee Percentage</th>
                        <th class="equal-width text-center">Fee</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="equal-width text-center">{{ $lastFeePercentage->feePreset->name }}</td><!-- fee preset name-->
                        <td class="equal-width text-center">{{ $lastFeePercentage->service->name }}</td><!-- Display service name-->
                        <td class="equal-width text-center">{{ number_format((($lastFeePercentage->threshold->fee_percentage + $lastFeePercentage->service->percentage) / 2), 2) }}%</td><!-- Display average percentage -->
                        <td class="equal-width text-center">{{ number_format($calculatedAmount) }} EGP</td> <!-- Display the calculated fee amount formatted to 2 decimal places -->
                    </tr>
                </tbody>
            </table>
        @else
            <h2>No transactions available.</h2>
        @endif
    @else
        <h2>No transactions available.</h2>
    @endif
@endsection
