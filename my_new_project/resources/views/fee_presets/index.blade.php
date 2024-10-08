@extends('layouts.app')

@section('content')
    <div class="landing-container">
        <div class="link-container">
            <a href="{{ route('fee_percentages.index') }}" class="link-btn">Calculate Fee Percentage</a>
            <br>
            <a href="{{ route('services.index') }}" class="link-btn">Manage Services</a>
            <br>
            <a href="{{ route('thresholds.index') }}" class="link-btn">Manage Thresholds</a>
            <br>
        </div>
    </div>
    <h1>Fee Presets</h1>

    <a href="{{ route('fee-presets.create') }}" class="btn btn-primary">Create New Preset</a>


    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feePreset as $preset)
                <tr>
                    <td>{{ $preset->name }}</td>
                    <td>
                        <a href="{{ route('fee-presets.edit', $preset->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('fee-presets.destroy', $preset->id) }}" method="POST" style="display:inline;">
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
