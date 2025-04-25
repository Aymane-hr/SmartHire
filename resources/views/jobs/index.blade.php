@extends('layouts.app')

@section('title', 'Offres d\'emploi')

@section('content')
    <h1>Liste des Offres</h1>

    @foreach($jobs as $job)
        <div>
            <h3>{{ $job->title }}</h3>
            <p>{{ $job->description }}</p>
            <a href="{{ route('jobs.show', $job->id) }}">Voir plus</a>
        </div>
    @endforeach
@endsection
