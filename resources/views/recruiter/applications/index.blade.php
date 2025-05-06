@extends('layouts.app')

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Applications</h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Applicant</th>
                                    <th>Job Title</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Actions</th> {{-- زر التحديث --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($applications as $app)
                                <tr>
                                    <td>{{ $app->user->name ?? 'N/A' }}</td>
                                    <td>{{ $app->job->title ?? 'N/A' }}</td>
                                    <td>{{ $app->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <div class="badge badge-{{ $app->status === 'pending' ? 'warning' : ($app->status === 'accepted' ? 'primary' : 'danger') }}">
                                            {{ ucfirst($app->status) }}
                                        </div>
                                    </td>
                                    <td>
                                        @if($app->status === 'pending')
                                            <form action="{{ route('recruiter.applications.updateStatus', $app->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="accepted">
                                                <button class="btn btn-success btn-sm">Accept</button>
                                            </form>

                                            <form action="{{ route('recruiter.applications.updateStatus', $app->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="rejected">
                                                <button class="btn btn-danger btn-sm">Reject</button>
                                            </form>
                                        @else
                                            <span class="text-muted">No actions</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="float-end mt-3">
                        {{ $applications->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
