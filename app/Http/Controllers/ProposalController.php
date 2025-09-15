<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Http\Controllers\ProposalController;
use Illuminate\Http\Request;


class ProposalController extends Controller
{
    /**
     * Tampilkan semua proposal (admin bisa lihat semua).
     */
    public function index()
    {
        return Proposal::with(['user','reviews'])->get();
    }

    /**
     * Simpan proposal baru (dosen upload).
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'type' => 'required|in:penelitian,pengabdian',
            'file_path' => 'required|string',
        ]);

        $proposal = Proposal::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'type' => $request->type,
            'file_path' => $request->file_path,
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
        $proposal->update($request->only(['title','type','file_path','status']));
        return response()->json($proposal);
    }

    /**
     * Hapus proposal.
     */
    public function destroy(Proposal $proposal)
    {
        $proposal->delete();
        return response()->json(['message' => 'Proposal deleted']);
    }
}
