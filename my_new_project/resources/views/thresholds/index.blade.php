@extends('layouts.app')

@section('content')
    <h1>Threshold</h1>

    <a href="{{ route('thresholds.create') }}" class="btn btn-primary">Create New Threshold</a>


    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($threshold as $threshold)
                <tr>
                    <td>{{ $threshold->amount }}</td>
                    <td>
                        <a href="{{ route('thresholds.edit', $threshold->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('thresholds.destroy', $threshold->id) }}" method="POST" style="display:inline;">
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
