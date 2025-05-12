@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Offres de travail</h2>
    <div class="row">
        @foreach($jobs as $job)
            <div class="col-md-6 mb-3">
                <div class="card p-3">
                    <h5>{{ $job->title }}</h5>
                    <p>{{ Str::limit($job->description, 100) }}</p>
                    <a href="{{ route('candidat.jobs.show', $job->id) }}" class="btn btn-sm btn-primary">
                        Voir plus
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $jobs->links() }}
    </div>
</div>
@endsection
