<?php

namespace App\Http\Controllers;

use App\Models\Deadline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeadlineController extends Controller
{
    public function index(Request $request)
    {
        $query = Deadline::query();
        if ($request->filled('name')) {
            $query->where('name', 'like', '%'.$request->string('name').'%');
        }
        $perPage = (int) $request->integer('per_page', 10);
        return $query->paginate($perPage);
    }

    public function store(Request $request)
    {
        Gate::authorize('role', 'admin');
        $validated = $request->validate([
            'name' => 'required|string',
            'start_at' => 'nullable|date',
            'end_at' => 'nullable|date|after_or_equal:start_at',
        ]);

        $deadline = Deadline::create($validated);
        return response()->json($deadline, 201);
    }

    public function show(Deadline $deadline)
    {
        return $deadline;
    }

    public function update(Request $request, Deadline $deadline)
    {
        Gate::authorize('role', 'admin');
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'start_at' => 'nullable|date',
            'end_at' => 'nullable|date|after_or_equal:start_at',
        ]);

        $deadline->update($validated);
        return response()->json($deadline);
    }

    public function destroy(Deadline $deadline)
    {
        Gate::authorize('role', 'admin');
        $deadline->delete();
        return response()->json(['message' => 'Deadline deleted']);
    }
}


