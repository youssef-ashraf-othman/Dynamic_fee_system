@extends('layouts.app')

@section('content')
    <h1 align = "center">Calculate your fees</h1>
    <div class="container">
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
            <br><br>
            <div>
                <label for="service_id"><b>Service:</b></label>
                <select name="service_id" required>
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
            <br><br>
            <div>
                <label for="threshold_amount"><b>Amount:</b></label>
                <input type="number" name="threshold_amount" id="threshold_amount" required min="0" step="any">
            </div>
            <br>
            <button type="submit">Calculate</button>
            
            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
    

    <script>
        document.getElementById('fee_preset_id').addEventListener('change', function() {
            const presetId = this.value;
            const serviceSelect = document.getElementById('service_id');
            serviceSelect.innerHTML = '<option value="">Select a Service</option>'; // Clear previous options

            if (presetId) {
                fetch(`/get-services/${presetId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.services.forEach(service => {
                            const option = document.createElement('option');
                            option.value = service.id;
                            option.textContent = service.name;
                            serviceSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching services:', error));
            }
        });
    </script>
@endsection
