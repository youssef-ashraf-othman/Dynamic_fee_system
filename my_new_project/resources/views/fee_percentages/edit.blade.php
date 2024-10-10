@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Fee Percentage</h1>

        <form action="{{ route('fee_percentages.update', $feePercentage->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="fee_preset_id">Fee Preset</label>
                <select name="fee_preset_id" id="fee_preset_id" class="form-control" required>
                    @foreach($feePresets as $preset)
                        <option value="{{ $preset->id }}" {{ $preset->id == $feePercentage->fee_preset_id ? 'selected' : '' }}>
                            {{ $preset->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="service_id">Service</label>
                <select name="service_id" id="service_id" class="form-control" required>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" {{ $service->id == $feePercentage->service_id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="threshold_id">Threshold</label>
                <select name="threshold_id" id="threshold_id" class="form-control" required>
                    @foreach($thresholds as $threshold)
                        <option value="{{ $threshold->id }}" {{ $threshold->id == $feePercentage->threshold_id ? 'selected' : '' }}>
                            {{ $threshold->amount }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Percentage Field -->
            <div class="form-group">
                <label for="percentage">Percentage</label>
                <input type="number" name="percentage" id="percentage" class="form-control" step="0.01" value="{{ old('percentage', $feePercentage->percentage) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
