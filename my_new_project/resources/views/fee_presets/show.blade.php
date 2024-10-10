@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Fee Preset Details</h1>

        <div class="card">
            <h2>
                Preset Name: {{ $feePreset->name }}
            </h2>
            <div class="card-body">
                <!-- رابط للعودة إلى الصفحة الرئيسية -->
                 
                <a href="{{ route('fee-presets.index') }}" class="btn btn-primary">Back to Fee Presets</a>
                <br>
                <br>
                <br>
                <!-- رابط لتحرير الـ preset -->
                <a href="{{ route('fee-presets.edit', $feePreset->id) }}" class="btn btn-secondary">Edit Fee Preset</a>
            </div>
        </div>
    </div>
@endsection
