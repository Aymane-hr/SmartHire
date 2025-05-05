@extends('layouts.app')

@section('content')
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>All Notifications</h4>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Message</th>
                                <th>Seen</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($notifications as $notification)
                                <tr>
                                    <td>{{ optional($notification->user)->name ?? 'N/A' }}</td>
                                    <td>{{ $notification->message ?? '-' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $notification->seen ? 'success' : 'warning' }}">
                                            {{ $notification->seen ? 'Seen' : 'Unseen' }}
                                        </span>
                                    </td>
                                    <td>{{ $notification->created_at?->format('d-m-Y H:i') ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('admin.notifications.show', $notification->id) }}" class="btn btn-sm btn-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="float-end mt-3">
                    {{ $notifications->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
