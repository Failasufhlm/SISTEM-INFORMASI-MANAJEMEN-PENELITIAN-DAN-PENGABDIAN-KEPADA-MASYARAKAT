<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalPageController extends Controller
{
    public function index(Request $request)
    {
        $query = Proposal::with(['user','reviews']);

        if ($request->filled('type')) {
            $query->where('type', $request->string('type'));
        }
        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }
        if ($request->filled('q')) {
            $query->where('title', 'like', '%'.$request->string('q').'%');
        }

        $proposals = $query->orderByDesc('id')->paginate(10)->withQueryString();

        return view('proposals.index', [
            'proposals' => $proposals,
            'filters' => [
                'type' => $request->string('type')->toString(),
                'status' => $request->string('status')->toString(),
                'q' => $request->string('q')->toString(),
            ],
        ]);
    }
}


