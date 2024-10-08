@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Thresholds</h1>

        <div class="card">
            <h2>
                Threshold Name: {{ $threshold->amount }}
            </h2>
            <div class="card-body">
                <!-- رابط للعودة إلى الصفحة الرئيسية -->
                 
                <a href="{{ route('thresholds.index') }}" class="btn btn-primary">Back to Thresholds</a>
                <br>
                <br>
                <br>
                <!-- رابط لتحرير الـ preset -->
                <a href="{{ route('thresholds.edit', $threshold->id) }}" class="btn btn-secondary">Edit Threshold</a>
            </div>
        </div>
    </div>
@endsection
