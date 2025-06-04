@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Create Exercise</h1>
        <form action="{{ route('exercises.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image</label>
                <input type="file" name="image" id="image" class="w-full border rounded px-3 py-2 @error('image') border-red-500 @enderror">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="type" class="block text-gray-700">Type</label>
                <select name="type" id="type" class="w-full border rounded px-3 py-2">
                    <option value="" disabled selected>Choose Type</option>
                    @foreach(config('exercise.types') as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="muscle" class="block text-gray-700">Muscle</label>
                <select name="muscle" id="muscle" class="w-full border rounded px-3 py-2">
                    <option value="" disabled selected>Choose Muscle</option>
                    @foreach(config('exercise.muscles') as $muscle)
                        <option value="{{ $muscle }}">{{ $muscle }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="equipment" class="block text-gray-700">Equipment</label>
                <select name="equipment" id="equipment" class="w-full border rounded px-3 py-2">
                    <option value="" disabled selected>Choose Equipment</option>
                    @foreach(config('exercise.equipment') as $equip)
                        <option value="{{ $equip }}">{{ $equip }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="difficulty" class="block text-gray-700">Difficulty</label>
                <select name="difficulty" id="difficulty" class="w-full border rounded px-3 py-2">
                    <option value="" disabled selected>Choose Difficulty</option>
                    @foreach(config('exercise.difficulties') as $level)
                        <option value="{{ $level }}">{{ $level }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="instructions" class="block text-gray-700">Instructions</label>
                <textarea name="instructions" id="instructions" class="w-full bor\der rounded px-3 py-2"></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
        </form>
    </div>
@endsection