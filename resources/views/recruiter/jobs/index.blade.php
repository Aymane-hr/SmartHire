<!-- resources/views/admin/jobs/index.blade.php -->
@extends('layouts.app')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Jobs</h2>
    </x-slot>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">All Jobs</h4>
                    <a href="{{ route('recruiter.jobs.create') }}" class="btn btn-success btn-sm">Add Job</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Job Title</th>
                                    <th>Recruiter</th>
                                    <th>Location</th>
                                    <th>Created At</th>
                                    {{-- <th>Status</th> --}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobs as $job)
                                    <tr>
                                        <td>{{ $job->title }}</td>
                                        <td>{{ optional($job->user)->name ?? 'N/A' }}</td>
                                        <td>{{ $job->location }}</td>
                                        <td>{{ $job->created_at->format('d-m-Y') }}</td>
                                        {{-- <td>
                                            <div class="badge badge-{{ 
                                                $job->status === 'active' ? 'success' : 
                                                ($job->status === 'closed' ? 'danger' : 'warning') 
                                            }}">
                                                {{ ucfirst($job->status) }}
                                            </div> --}}
                                        </td>
                                        <td>
                                            <a href="{{ route('recruiter.jobs.edit', $job->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('recruiter.jobs.destroy', $job->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
    
                    <div class="float-right mt-3">
                        {{ $jobs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
@endsection