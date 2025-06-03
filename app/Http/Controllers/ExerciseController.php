<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ExerciseController extends Controller
{
    private $apiUrl = 'http://localhost:3000';

    public function index()
    {
        try {
            $response = Http::get("{$this->apiUrl}/exercises");
            $responseData = $response->json();
            $exercises = $responseData['data'] ?? [];
            // dd($exercises);
            return view('exercises.index', compact('exercises'));
        } catch (\Exception $e) {
            Log::error('Error fetching exercises: ' . $e->getMessage());
            return back()->with('error', 'Failed to fetch exercises');
        }
    }

    public function create()
    {
        return view('exercises.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            $data = [
                'name' => $request->name,
                'description' => $request->description,
            ];

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $response = Http::attach(
                    'image', file_get_contents($image), $image->getClientOriginalName()
                )->post("{$this->apiUrl}/exercises", $data);

                if ($response->failed()) {
                    return back()->with('error', 'Failed to upload image');
                }
            } else {
                Http::post("{$this->apiUrl}/exercises", $data);
            }

            return redirect()->route('exercises.index')->with('success', 'Exercise created successfully');
        } catch (\Exception $e) {
            Log::error('Error creating exercise: ' . $e->getMessage());
            return back()->with('error', 'Failed to create exercise');
        }
    }

    public function show($id)
    {
        try {
            $response = Http::get("{$this->apiUrl}/exercises/{$id}");
            $responseData = $response->json();
            $exercise = $responseData['data'] ?? [];
            return view('exercises.show', compact('exercise'));
        } catch (\Exception $e) {
            Log::error('Error fetching exercise: ' . $e->getMessage());
            return back()->with('error', 'Failed to fetch exercise');
        }
    }

    public function edit($id)
    {
        try {
            $response = Http::get("{$this->apiUrl}/exercises/{$id}");
            $responseData = $response->json();
            $exercise = $responseData['data'] ?? [];
            return view('exercises.edit', compact('exercise'));
        } catch (\Exception $e) {
            Log::error('Error fetching exercise for edit: ' . $e->getMessage());
            return back()->with('error', 'Failed to fetch exercise');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'instructions' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        try {
            $data = [
                'id' => (int)$id,
                'name' => $request->name,
                'type' => $request->type,
                'muscle' => $request->muscle,
                'equipment' => $request->equipment,
                'difficulty' => $request->difficulty,
                'instructions' => $request->instructions,
            ];

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $response = Http::attach(
                    'image', file_get_contents($image), $image->getClientOriginalName()
                )->put("{$this->apiUrl}/exercises/{$id}", $data);

                if ($response->failed()) {
                    return back()->with('error', 'Failed to upload image');
                }
            } else {
                $response = Http::put("{$this->apiUrl}/exercises/{$id}", $data);
                if ($response->failed()) {
                    return back()->with('error', $response->json('message'));
                }
            }

            return redirect()->route('exercises.index')->with('success', 'Exercise updated successfully');
        } catch (\Exception $e) {
            Log::error('Error updating exercise: ' . $e->getMessage());
            return back()->with('error', 'Failed to update exercise');
        }
    }

    public function destroy($id)
    {
        try {
            Http::delete("{$this->apiUrl}/exercises/{$id}");
            return redirect()->route('exercises.index')->with('success', 'Exercise deleted successfully');
        } catch (\Exception $e) {
            Log::error('Error deleting exercise: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete exercise');
        }
    }
}