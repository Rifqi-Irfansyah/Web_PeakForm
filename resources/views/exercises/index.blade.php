@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Exercises</h1>
            <a href="{{ route('exercises.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Exercise</a>
        </div>
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2">Muscle</th>
                    <th class="px-4 py-2">Image</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($exercises as $exercise)
                    <tr>
                        <td class="border px-4 py-2">{{ $exercise['Name'] ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $exercise['Type'] ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">{{ $exercise['Muscle'] ?? 'N/A' }}</td>
                        <td class="border px-4 py-2">
                            @if (isset($exercise['Image']))
                                <img src="http://localhost:3000/static/exercises/{{ $exercise['Image'] }}" alt="{{ $exercise['Name'] ?? 'Exercise' }}" class="w-20 h-20 object-cover">
                            @else
                                No Image
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('exercises.show', $exercise['ID']) }}" class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('exercises.edit', $exercise['ID']) }}" class="text-green-600 hover:underline ml-2">Edit</a>
                            <form action="{{ route('exercises.destroy', $exercise['ID']) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline ml-2" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection