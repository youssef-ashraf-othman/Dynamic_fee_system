@extends('layouts.app')

@section('content')
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
