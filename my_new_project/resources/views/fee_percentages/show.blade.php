@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Fee Percentage Details</h1>

        <div class="card">
            <div class="card-body">
                <h3>Fee Preset: 
                    @if ($feePercentage->fee_preset_id == 1)
                        Standard
                    @else
                        Premium
                    @endif
                </h3>
                <h3>Service: 
                    @if ($feePercentage->service_id == 1)
                        Delivery
                    @else
                        Subscription
                    @endif
                </h3>
                <h3>Threshold: {{ $feePercentage->threshold->amount }}</h3>
            </div>

            <div class="mt-3">
                <!-- Link to edit the fee percentage -->
                <a href="{{ route('fee_percentages.edit', $feePercentage->id) }}" class="btn btn-warning">Edit</a>

                <!-- Form to delete the fee percentage -->
                <form action="{{ route('fee_percentages.destroy', $feePercentage->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

                <!-- Link to go back to the index -->
                <a href="{{ route('fee_percentages.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
