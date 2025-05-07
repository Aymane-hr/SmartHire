@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Recruiter Dashboard</h1>
        <p>Welcome, {{ Auth::user()->name }}!</p>

        <h2>Your Job Listings</h2>
        {{-- <ul>
            @foreach($jobListings as $job)
                <li>{{ $job->title }} - {{ $job->status }}</li>
            @endforeach
        </ul> --}}

        <h2>Statistics</h2>
        {{-- <p>Total Applications: {{ $totalApplications }}</p>
        <p>Total Hires: {{ $totalHires }}</p> --}}
    </div>
@endsection