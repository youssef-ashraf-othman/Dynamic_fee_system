@extends('layouts.app')

@section('content')


<h1>Manage Services</h1>

<a href="{{ route('services.create') }}" class="button">Create New Service</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="equal-width"><b>Service Name</b></th>
            <th class="equal-width"><b>Fee Preset</b></th>
            <th class="equal-width"><b>Fee Percentage</b></th>
            <th class="equal-width"><b>Options</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($services as $service)
            <tr>
                <!-- Service Name -->
                <td class="equal-width"><b>{{ $service->name }}</b></td>

                <!-- Fee Preset Name -->
                <td class="equal-width">
                    {{ $service->feePreset->name }}
                </td>

                <!-- Fee Percentage -->
                <td class="equal-width">
                    {{ $service->percentage }}%
                </td>

                <!-- Edit and Delete Options -->
                <td class="equal-width text-center">
                    <div class="btn-container">
                        <a href="{{ route('services.edit', $service->id) }}" class="button">Edit</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
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
