<?php

namespace App\Http\Controllers;

use App\Models\ProgressReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProgressReportController extends Controller
{
    public function index(Request $request)
    {
        $query = ProgressReport::with(['proposal','user']);
        if ($request->filled('proposal_id')) {
            $query->where('proposal_id', $request->integer('proposal_id'));
        }
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->integer('user_id'));
        }
        $perPage = (int) $request->integer('per_page', 10);
        return $query->paginate($perPage);
    }

    public function store(Request $request)
    {
        Gate::authorize('role', 'dosen');
        $validated = $request->validate([
            'proposal_id' => 'required|exists:proposals,id',
            'user_id' => 'required|exists:users,id',
            'file' => 'required|file',
            'notes' => 'nullable|string',
        ]);

        $path = $request->file('file')->store('progress_reports', 'public');
        $report = ProgressReport::create([
            'proposal_id' => $validated['proposal_id'],
            'user_id' => $validated['user_id'],
            'file_path' => $path,
            'notes' => $validated['notes'] ?? null,
        ]);
        return response()->json($report, 201);
    }

    public function show(ProgressReport $progressReport)
    {
        return $progressReport->load(['proposal','user']);
    }

    public function update(Request $request, ProgressReport $progressReport)
    {
        Gate::authorize('role', 'dosen');
        $validated = $request->validate([
            'notes' => 'nullable|string',
        ]);

        $data = $validated;
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('progress_reports', 'public');
        }
        $progressReport->update($data);
        return response()->json($progressReport);
    }

    public function destroy(ProgressReport $progressReport)
    {
        Gate::authorize('role', 'admin');
        $progressReport->delete();
        return response()->json(['message' => 'Progress report deleted']);
    }
}


