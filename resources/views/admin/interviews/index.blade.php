@extends('layouts.app')

@section('content')
<section class="section py-4">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white">
                        <h4 class="mb-0">All Applications</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Candidate</th>
                                        <th>Job Title</th>
                                        <th>Interview Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($interviews as $interview)
                                        <tr>
                                            <td>{{ optional($interview->application->user)->name }}</td>
                                            <td>{{ optional($interview->application->job)->title }}</td>
                                            <td>{{ \Carbon\Carbon::parse($interview->interview_date)->format('d-m-Y H:i') }}</td>
                                            <td>
                                                <a href="{{ route('admin.interviews.show', $interview->id) }}" class="btn btn-sm btn-primary">
                                                    View
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">No interviews found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="p-3">
                            {{ $interviews->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
