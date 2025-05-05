@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card mb-0">
          <div class="card-body">
            <ul class="nav nav-pills">
                @foreach(['all' => 'All', 'accepted' => 'Accepted', 'pending' => 'Pending', 'rejected' => 'Rejected'] as $key => $label)
                  <li class="nav-item">
                    <a 
                      class="nav-link {{ $currentStatus === $key ? 'active' : '' }}" 
                      href="{{ route('admin.applications.index', ['status' => $key]) }}">
                      {{ $label }} 
                      <span class="badge badge-{{ $key === 'all' ? 'white' : 'primary' }}">
                        {{ $statusCounts[$key] ?? 0 }}
                      </span>
                    </a>
                  </li>
                @endforeach
              </ul>
              
          </div>
        </div>
      </div>
    </div>

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
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            <div class="float-right">
              {{ $applications->links() }}
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
