@extends('layouts.app')

@section('content')


<h1>Fee Presets</h1>

<a href="{{ route('fee-presets.create') }}" class="button">Create New Preset</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="equal-width"><b>Fee presets</b></th>
            <th class="equal-width"><b>Services</b></th>
            <th class="equal-width"><b>Threesholds</b></th>
            <th class="equal-width"><b>Options</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($feePreset as $preset)
            <tr>
                <!-- Fee Preset Name -->
                <td class="equal-width"><b>{{ $preset->name }}</b></td>


                @if($preset->services->isEmpty())
                        <td class="equal-width">
                            <a href="{{ route('services.create', ['fee_preset_id' => $preset->id]) }}" class="button">
                                Add service
                            </a>
                        </td>
                    
                @else
                  <!-- Services -->
                    <td class="equal-width">
                        <ul class="service-list"> <!-- New Service List -->
                            @foreach ($preset->services as $service)
                                <li>
                                    {{ $service->name }} <!-- Displaying the service name -->
                                    <br> 
                                    @if(!$loop->last)
                                    <br>
                           
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </td>
                @endif
                    
                <!-- Thresholds -->
                <td class="equal-width">
                    <ul class="threshold-list">
                        @foreach ($preset->thresholds as $index => $threshold)
                            <li>
                                <span>{{ $threshold->min_value }} ==========> {{ $threshold->max_value }}</span>
                                <br> 
                                @if(!$loop->last)
                                    <hr> <!-- Line between thresholds -->
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </td>

                

              

                <!-- Edit and Delete Options -->
                <td class="equal-width text-center">
                    <div class="btn-container">
                        <a href="{{ route('fee-presets.edit', $preset->id) }}" class="button">Edit</a>
                        <form action="{{ route('fee-presets.destroy', $preset->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <br>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
