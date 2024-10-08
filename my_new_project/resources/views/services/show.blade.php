@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Services  Details</h1>

        <div class="card">
            <h2>
                Preset Name: {{ $services ->name }}
            </h2>
            <div class="card-body">
                <!-- رابط للعودة إلى الصفحة الرئيسية -->
                 
                <a href="{{ route('services .index') }}" class="btn btn-primary">Back to Services</a>
                <br>
                <br>
                <br>
                <!-- رابط لتحرير الـ preset -->
                <a href="{{ route('services .edit', $services ->id) }}" class="btn btn-secondary">Edit Service </a>
            </div>
        </div>
    </div>
@endsection
