<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class ProposalController extends Controller
{
    /**
     * Tampilkan semua proposal (admin bisa lihat semua).
     */
    public function index(Request $request)
    {
        $query = Proposal::with(['user','reviews']);

        // filtering
        if ($request->filled('type')) {
            $query->where('type', $request->string('type'));
        }
        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        // pagination
        $perPage = (int) $request->integer('per_page', 10);
        return $query->paginate($perPage);
    }

    /**
     * Simpan proposal baru (dosen upload).
     */
    public function store(Request $request)
    {
        Gate::authorize('role', 'dosen');
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'type' => 'required|in:penelitian,pengabdian',
            'file' => 'required|file',
        ]);

        $path = $request->file('file')->store('proposals', 'public');

        $proposal = Proposal::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'type' => $request->type,
            'file_path' => $path,
            'status' => 'submitted',
        ]);

        return response()->json($proposal, 201);
    }

    /**
     * Tampilkan detail proposal tertentu.
     */
    public function show(Proposal $proposal)
    {
        return $proposal->load(['user','reviews']);
    }

    /**
     * Update proposal (misalnya admin ubah status).
     */
    public function update(Request $request, Proposal $proposal)
    {
        Gate::authorize('role', 'admin');
        $data = $request->only(['title','type','status']);
        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('proposals', 'public');
        }
        $proposal->update($data);
        return response()->json($proposal);
    }

    /**
     * Hapus proposal.
     */
    public function destroy(Proposal $proposal)
    {
        Gate::authorize('role', 'admin');
        $proposal->delete();
        return response()->json(['message' => 'Proposal deleted']);
    }
}
