<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $query = Review::with(['proposal','user']);
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
        Gate::authorize('role', 'reviewer');
        $validated = $request->validate([
            'proposal_id' => 'required|exists:proposals,id',
            'user_id' => 'required|exists:users,id',
            'score' => 'nullable|integer|min:0|max:100',
            'comment' => 'nullable|string',
        ]);

        $review = Review::create($validated);
        return response()->json($review, 201);
    }

    public function show(Review $review)
    {
        return $review->load(['proposal','user']);
    }

    public function update(Request $request, Review $review)
    {
        Gate::authorize('role', 'reviewer');
        $validated = $request->validate([
            'score' => 'nullable|integer|min:0|max:100',
            'comment' => 'nullable|string',
        ]);

        $review->update($validated);
        return response()->json($review);
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json(['message' => 'Review deleted']);
    }
}


