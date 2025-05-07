@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>My Profile</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-4">
                <!-- Profile Card -->
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset('assets/img/users/user-1.png') }}" class="rounded-circle mb-3" width="120" alt="Profile Image">
                        <h5 class="mb-0">{{ $user->name }}</h5>
                        <small class="text-muted">{{ ucfirst($user->role ?? 'Candidate') }}</small>
                        <div class="mt-3">
                            <a href="{{ route('candidat.profile.edit') }}" class="btn btn-sm btn-outline-primary">Edit Profile</a>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="card">
                    <div class="card-header"><h4>Contact Info</h4></div>
                    <div class="card-body">
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        @if($user->phone)
                        <p><strong>Phone:</strong> {{ $user->phone }}</p>
                        @endif
                        @if($user->location)
                        <p><strong>Location:</strong> {{ $user->location }}</p>
                        @endif
                    </div>
                </div>

                <!-- Skills -->
                <div class="card">
                    <div class="card-header"><h4>Skills</h4></div>
                    <div class="card-body">
                        @if($skills->count())
                            @foreach($skills as $skill)
                                <span class="badge badge-info mb-1">{{ $skill->name }}</span>
                            @endforeach
                        @else
                            <p class="text-muted">No skills listed.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <!-- CV Summary -->
                <div class="card">
                    <div class="card-header"><h4>Latest CV Summary</h4></div>
                    <div class="card-body">
                        @if($latestCv && $latestCv->extracted_text)
                            <p>{{ Str::limit($latestCv->extracted_text, 500) }}</p>
                        @else
                            <p class="text-muted">No CV uploaded yet.</p>
                        @endif
                    </div>
                </div>

                <!-- Match Scores -->
                <div class="card">
                    <div class="card-header"><h4>CV Match Scores</h4></div>
                    <div class="card-body">
                        @if($matches->count())
                            @foreach($matches as $match)
                                <div class="mb-3">
                                    <h6>{{ $match->job->title ?? 'Deleted Job' }}</h6>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar"
                                            style="width: {{ $match->match_score }}%"
                                            aria-valuenow="{{ $match->match_score }}" aria-valuemin="0" aria-valuemax="100">
                                            {{ round($match->match_score) }}%
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted">No match scores available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
