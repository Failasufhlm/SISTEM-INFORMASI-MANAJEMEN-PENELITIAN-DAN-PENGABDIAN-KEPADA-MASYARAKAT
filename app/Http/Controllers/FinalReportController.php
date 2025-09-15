<?php

namespace App\Http\Controllers;

use App\Models\FinalReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FinalReportController extends Controller
{
    public function index(Request $request)
    {
        $query = FinalReport::with(['proposal','user']);
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

        $path = $request->file('file')->store('final_reports', 'public');
        $report = FinalReport::create([
            'proposal_id' => $validated['proposal_id'],
            'user_id' => $validated['user_id'],
            'file_path' => $path,
            'notes' => $validated['notes'] ?? null,
        ]);
        return response()->json($report, 201);
    }

    public function show(FinalReport $finalReport)
    {
        return $finalReport->load(['proposal','user']);
    }

    public function update(Request $request, FinalReport $finalReport)
    {
        Gate::authorize('role', 'dosen');
        $validated = $request->validate([
            'notes' => 'nullable|string',
        ]);

        $data = $validated;
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('final_reports', 'public');
        }
        $finalReport->update($data);
        return response()->json($finalReport);
    }

    public function destroy(FinalReport $finalReport)
    {
        Gate::authorize('role', 'admin');
        $finalReport->delete();
        return response()->json(['message' => 'Final report deleted']);
    }
}


