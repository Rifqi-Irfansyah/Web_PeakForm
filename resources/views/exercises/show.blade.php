@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">{{ $exercise['Name'] }}</h1>
        <div class="mb-4">
            <strong>Image:</strong><br>
            @if (isset($exercise['Image']))
                <img src="http://localhost:3000/static/exercises/{{ $exercise['Image'] }}" alt="{{ $exercise['Name'] }}" class="w-40 h-40 object-cover">
            @else
                <p>No Image</p>
            @endif
        </div>
        <div class="mb-4">
            <strong>Type:</strong>
            <p>{{ $exercise['Type'] }}</p>
        </div>
        <div class="mb-4">
            <strong>Muscle:</strong>
            <p>{{ $exercise['Muscle'] }}</p>
        </div>
        <div class="mb-4">
            <strong>Equipment:</strong>
            <p>{{ $exercise['Equipment'] }}</p>
        </div>
        <div class="mb-4">
            <strong>Difficulty:</strong>
            <p>{{ $exercise['Difficulty'] }}</p>
        </div>
        <div class="mb-4">
            <strong>Instructions:</strong>
            <p>{{ $exercise['Instructions'] }}</p>
        </div>
        <a href="{{ route('exercises.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Back</a>
    </div>
@endsection