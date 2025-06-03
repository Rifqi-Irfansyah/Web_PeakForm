@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Edit Exercise</h1>
        <form action="{{ route('exercises.update', $exercise['ID']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror" value="{{ old('name', $exercise['Name']) }}">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
             <div class="mb-4">
                <label for="image" class="block text-gray-700">Image</label>
                @if (isset($exercise['Image']))
                    <p>Current image: <img src="http://localhost:3000/static/exercises/{{ $exercise['Image'] }}" alt="{{ $exercise['Name'] }}" class="w-20 h-20 object-cover mt-2"></p>
                @endif
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <input type="file" name="image" id="image" class="w-full border rounded px-3 py-2 @error('image') border-red-500 @enderror">
            </div>
            <div class="mb-4">
                <label for="instructions" class="block text-gray-700">Instructions</label>
                <textarea name="instructions" id="instructions" class="w-full border rounded px-3 py-2 @error('Instructions') border-red-500 @enderror">{{ old('Instructions', $exercise['Instructions']) }}</textarea>
                @error('Instructions')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        </form>
    </div>
@endsection