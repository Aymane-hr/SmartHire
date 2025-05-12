@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card p-4">
        <h2>{{ $job->title }}</h2>
        <p><strong>Lieu :</strong> {{ $job->location }}</p>
        <p><strong>Description :</strong></p>
        <p>{{ $job->description }}</p>

        <hr>

        <form action="{{ route('candidat.jobs.storeApplication') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="job_id" value="{{ $job->id }}">

            <div class="mb-3">
                <label for="cover_letter" class="form-label">Lettre de motivation</label>
                <textarea
                    name="cover_letter"
                    id="cover_letter"
                    rows="4"
                    class="form-control @error('cover_letter') is-invalid @enderror"
                    required
                >{{ old('cover_letter') }}</textarea>
                @error('cover_letter')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cv" class="form-label">Votre CV (PDF seulement)</label>
                <input
                    type="file"
                    name="cv"
                    id="cv"
                    class="form-control @error('cv') is-invalid @enderror"
                    accept="application/pdf"
                    required
                >
                @error('cv')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Postuler</button>
        </form>
    </div>
</div>
@endsection
