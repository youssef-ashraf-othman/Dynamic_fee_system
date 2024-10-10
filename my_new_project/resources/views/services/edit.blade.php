@extends('layouts.app')

@section('content')
<div class="container">
    <h1 align = 'center'>Edit Service</h1>

    <form action="{{ route('services.update', $service->id) }}" method="POST" class="form-container" onsubmit="return validateForm()">
        @csrf
        @method('PUT')

        <!-- Service Name Section -->
        <br><br>
        <div class="form-group mb-4">
            <label for="name" class="form-label">Service Name:</label>
            <input type="text" size =100 name="name" class="form-control" value="{{ $service->name }}" required oninput="checkFormValidity()">
        </div>
        <br><br><br>

        <hr>
        <br><br><br>
        <!-- Fee Preset Selection -->
        <div class="form-group mb-4">
            <label for="fee_preset_id" class="form-label">Select Fee Preset:</label>
            <select name="fee_preset_id" class="form-control" required onchange="checkFormValidity()">
                <option value="">Select a preset</option>
                @foreach ($feePresets as $preset)
                    <option value="{{ $preset->id }}" {{ $preset->id == $service->fee_preset_id ? 'selected' : '' }}>
                        {{ $preset->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <br><br><br>

        <hr>
        <br><br><br>

        <!-- Percentage Section -->
        <div class="form-group mb-4">
            <label for="percentage" class="form-label">Fee Percentage:</label>
            <input type="number" name="percentage" class="form-control" value="{{ $service->percentage }}" required oninput="checkFormValidity()" step="0.01">
        </div>

        <!-- Submit Button -->
        <div class="crtbtn">
            <button type="submit" class="btn btn-primary" id="update-service-btn" style="margin-top: 10px;">Update Service</button>
        </div>
    </form>
</div>

<!-- Script for Form Validation -->
<script>
    function checkFormValidity() {
        const serviceName = document.querySelector('input[name="name"]').value.trim();
        const feePreset = document.querySelector('select[name="fee_preset_id"]').value;
        const percentage = document.querySelector('input[name="percentage"]').value.trim();
        const updateServiceBtn = document.getElementById('update-service-btn');

        // Check if all fields are filled
        const allFilled = serviceName.length > 0 && feePreset.length > 0 && percentage.length > 0;

        // Enable or disable the Update Service button
        updateServiceBtn.disabled = !allFilled;
    }

    // Initial check for enabling/disabling the Update Service button
    checkFormValidity();
</script>
@endsection
