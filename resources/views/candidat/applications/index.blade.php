@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('My Applications') }}</div>

                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if($applications->count())
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Job Title</th>
                                            <th>Company</th>
                                            <th>Applied On</th>
                                            <th>Status</th>
                                            <th>CV</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($applications as $index => $application)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $application->job->title ?? 'N/A' }}</td>
                                                <td>{{ $application->job->company->name ?? 'N/A' }}</td>
                                                <td>{{ $application->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    @if($application->status === 'pending')
                                                        <span class="badge bg-warning text-dark">Pending</span>
                                                    @elseif($application->status === 'accepted')
                                                        <span class="badge bg-success">Accepted</span>
                                                    @elseif($application->status === 'rejected')
                                                        <span class="badge bg-danger">Rejected</span>
                                                    @else
                                                        <span class="badge bg-secondary">Unknown</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($application->cv)
                                                        <a href="{{ asset('cvs/' . $application->cv) }}" target="_blank"
                                                            class="btn btn-sm btn-outline-primary">View CV</a>
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- Pagination --}}
                            <div class="d-flex justify-content-center mt-4">
                                {{ $applications->links() }}
                            </div>
                        @else
                            <div class="alert alert-info">
                                You have not submitted any applications yet.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection