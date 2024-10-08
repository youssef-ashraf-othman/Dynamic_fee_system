@extends('layouts.app')

@section('content')
    <div class="landing-container">
        <div class="link-container">
            <a href="{{ route('fee_percentages.index') }}" class="link-btn">Calculate Fee Percentage</a>
            <br>
            <a href="{{ route('fee_presets.index') }}" class="link-btn">Manage Fee Presets</a>
            <br>
            <a href="{{ route('thresholds.index') }}" class="link-btn">Manage Thresholds</a>
            <br>
        </div>
    </div>

    <h1>Services</h1>

    <a href="{{route('services.create')}}" class="btn btn-primary">Add New Service</a>
    

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($service as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>
                        <a href="{{ route('services.edit', $service ->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('services.destroy', $service ->id) }}" method="POST" style="display:inline;">
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
