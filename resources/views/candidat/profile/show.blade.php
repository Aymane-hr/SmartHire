@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                    <div class="card-body">
                        <div class="author-box-center">
                            <img alt="profile" src="{{ asset('assets/img/users/user-1.png') }}" class="rounded-circle author-box-picture"/>
                            <div class="clearfix"></div>
                            <div class="author-box-name">
                                <a href="#">{{ $user->name }}</a>
                            </div>
                            @if($user->role)
                            <div class="author-box-job">{{ ucfirst($user->role) }}</div>
                            @endif
                        </div>
                        <div class="text-center">
                            @if($latestCv && $latestCv->extracted_text)
                            <div class="author-box-description">
                                <p>{{ Str::limit($latestCv->extracted_text, 200) }}</p>
                            </div>
                            @endif
                            <div class="mb-2 mt-3">
                                <div class="text-small font-weight-bold">Contact Information</div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="mailto:{{ $user->email }}" class="btn btn-icon icon-left btn-light mr-2">
                                    <i class="fas fa-envelope"></i> Email
                                </a>
                                @if($user->created_at)
                                <div class="badge badge-info">
                                    Member since {{ $user->created_at->format('M Y') }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Skills Card -->
                <div class="card">
                    <div class="card-header">
                        <h4>Skills</h4>
                    </div>
                    <div class="card-body">
                        @if($skills->count() > 0)
                        <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                            @foreach($skills as $skill)
                            <li class="media">
                                <div class="media-body">
                                    <div class="media-title">{{ $skill->name }}</div>
                                </div>
                                <div class="media-progressbar p-t-10">
                                    <!-- If you add proficiency levels to cv_skill table -->
                                    <div class="progress" data-height="6">
                                        <div class="progress-bar bg-primary" data-width="{{ rand(50, 100) }}%"></div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <div class="alert alert-light">No skills listed yet</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                    <div class="padding-20">
                        <ul class="nav nav-tabs" id="profileTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="cv-tab" data-toggle="tab" href="#cv" role="tab">CV Details</a>
                            </li>
                        </ul>

                        <div class="tab-content tab-bordered" id="profileContent">
                            <!-- Profile Tab -->
                            <div class="tab-pane fade show active" id="about" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-4 col-6 b-r">
                                        <strong>Full Name</strong>
                                        <p class="text-muted">{{ $user->name }}</p>
                                    </div>
                                    <div class="col-md-4 col-6 b-r">
                                        <strong>Email</strong>
                                        <p class="text-muted">{{ $user->email }}</p>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <strong>Account Type</strong>
                                        <p class="text-muted">{{ $user->role ?? 'N/A' }}</p>
                                    </div>
                                </div>

                                @if($latestCv)
                                <div class="section-title mt-4">Latest CV Summary</div>
                                <p class="m-t-30">
                                    {{ $latestCv->extracted_text ? Str::limit($latestCv->extracted_text, 500) : 'No CV summary available' }}
                                </p>
                                
                                <div class="section-title">CV Match Scores</div>
                                <div class="row">
                                    @foreach($user->matches as $match)
                                    <div class="col-md-6">
                                        <div class="card mb-2">
                                            <div class="card-body">
                                                <h6>{{ $match->job->title ?? 'Deleted Job' }}</h6>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" 
                                                        style="width: {{ $match->match_score }}%"
                                                        aria-valuenow="{{ $match->match_score }}" 
                                                        aria-valuemin="0" 
                                                        aria-valuemax="100">
                                                        {{ round($match->match_score) }}%
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>

                            <!-- CV Details Tab -->
                            <div class="tab-pane fade" id="cv" role="tabpanel">
                                @if($user->cvs->count() > 0)
                                <div class="list-group">
                                    @foreach($user->cvs as $cv)
                                    <div class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h6>CV Uploaded {{ $cv->created_at->diffForHumans() }}</h6>
                                                <p class="mb-0">Score: {{ $cv->score ?? 'Not scored yet' }}</p>
                                            </div>
                                            <a href="{{ asset($cv->file_path) }}" 
                                               class="btn btn-icon icon-left btn-primary"
                                               target="_blank">
                                               <i class="fas fa-download"></i> Download
                                            </a>
                                        </div>
                                        @if($cv->skills->count() > 0)
                                        <div class="mt-2">
                                            <strong>Skills Detected:</strong>
                                            @foreach($cv->skills as $skill)
                                            <span class="badge badge-info">{{ $skill->name }}</span>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <div class="alert alert-warning">
                                    No CVs uploaded yet. 
                                    <a href="{{ route('cvs.create') }}">Upload your first CV</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection