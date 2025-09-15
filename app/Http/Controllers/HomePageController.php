<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Review;
use App\Models\ProgressReport;
use App\Models\FinalReport;
use App\Models\Output;
use App\Models\Deadline;

class HomePageController extends Controller
{
    public function index()
    {
        $stats = [
            'proposals' => Proposal::count(),
            'reviews' => Review::count(),
            'progress_reports' => ProgressReport::count(),
            'final_reports' => FinalReport::count(),
            'outputs' => Output::count(),
            'deadlines' => Deadline::count(),
        ];

        $latestProposals = Proposal::with('user')->latest('id')->limit(5)->get();

        return view('home', compact('stats', 'latestProposals'));
    }
}


