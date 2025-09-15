<?php

namespace App\Http\Controllers;

use App\Models\Output;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OutputController extends Controller
{
    public function index(Request $request)
    {
        $query = Output::with(['proposal']);
        if ($request->filled('proposal_id')) {
            $query->where('proposal_id', $request->integer('proposal_id'));
        }
        if ($request->filled('type')) {
            $query->where('type', $request->string('type'));
        }
        $perPage = (int) $request->integer('per_page', 10);
        return $query->paginate($perPage);
    }

    public function store(Request $request)
    {
        Gate::authorize('role', 'dosen');
        $validated = $request->validate([
            'proposal_id' => 'required|exists:proposals,id',
            'type' => 'required|string',
            'title' => 'required|string',
            'file' => 'nullable|file',
        ]);

        $path = $request->hasFile('file') ? $request->file('file')->store('outputs', 'public') : null;
        $output = Output::create([
            'proposal_id' => $validated['proposal_id'],
            'type' => $validated['type'],
            'title' => $validated['title'],
            'file_path' => $path,
        ]);
        return response()->json($output, 201);
    }

    public function show(Output $output)
    {
        return $output->load(['proposal']);
    }

    public function update(Request $request, Output $output)
    {
        Gate::authorize('role', 'dosen');
        $validated = $request->validate([
            'type' => 'sometimes|string',
            'title' => 'sometimes|string',
            'file' => 'nullable|file',
        ]);
        $data = $validated;
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('outputs', 'public');
        }
        $output->update($data);
        return response()->json($output);
    }

    public function destroy(Output $output)
    {
        Gate::authorize('role', 'admin');
        $output->delete();
        return response()->json(['message' => 'Output deleted']);
    }
}


