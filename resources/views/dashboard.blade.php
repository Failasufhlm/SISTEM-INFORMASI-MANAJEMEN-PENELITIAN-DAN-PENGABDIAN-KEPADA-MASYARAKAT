@php
    // Example fallback stats if controller not wired yet
    $stats = $stats ?? [
        'total_proposals' => \App\Models\Proposal::count(),
        'approved_proposals' => \App\Models\Proposal::where('status','approved')->count(),
        'outputs' => \App\Models\Output::count(),
    ];
@endphp

@extends('layouts.dashboard')

@section('title', 'Dashboard - SIM-PPM')
@section('header', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow p-5 border border-gray-100">
            <div class="text-sm text-gray-500">Total Proposal</div>
            <div class="mt-2 text-3xl font-semibold text-unu-secondary">{{ $stats['total_proposals'] }}</div>
        </div>
        <div class="bg-white rounded-xl shadow p-5 border border-gray-100">
            <div class="text-sm text-gray-500">Proposal Lolos</div>
            <div class="mt-2 text-3xl font-semibold text-unu-secondary">{{ $stats['approved_proposals'] }}</div>
        </div>
        <div class="bg-white rounded-xl shadow p-5 border border-gray-100">
            <div class="text-sm text-gray-500">Total Luaran</div>
            <div class="mt-2 text-3xl font-semibold text-unu-secondary">{{ $stats['outputs'] }}</div>
        </div>
    </div>

    <div class="mt-8 bg-unu-accent/60 rounded-xl p-4 border border-unu-accent">
        <div class="flex items-center justify-between">
            <div>
                <div class="text-sm text-gray-700">Akses cepat</div>
                <div class="mt-1 text-gray-900 font-medium">Kelola Proposal dan Laporan</div>
            </div>
            <div class="space-x-2">
                <a href="{{ url('/proposals') }}" class="inline-flex items-center px-4 py-2 rounded-md bg-unu-secondary text-white hover:opacity-90">Proposal</a>
                <a href="#" class="inline-flex items-center px-4 py-2 rounded-md bg-unu-primary text-white hover:opacity-90">Laporan</a>
            </div>
        </div>
    </div>
@endsection


