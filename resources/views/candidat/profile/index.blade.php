@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('candidat.profile.store') }}" enctype="multipart/form-data">
                        @csrf

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Avatar Upload --}}
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="avatar" class="form-label">Avatar:</label>
                                <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
                                @error('avatar')
                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                @if(auth()->user()->avatar)
                                    <img src="{{ asset('avatars/' . auth()->user()->avatar) }}" alt="avatar" style="width: 80px; margin-top: 10px;">
                                @endif
                            </div>
                        </div>

                        {{-- CV Upload --}}
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="cv" class="form-label">Upload CV (PDF/DOC):</label>
                                <input id="cv" type="file" class="form-control @error('cv') is-invalid @enderror" name="cv">
                                @error('cv')
                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                @if(auth()->user()->cv)
                                    <a href="{{ asset('cvs/' . auth()->user()->cv) }}" target="_blank" class="btn btn-sm btn-outline-secondary mt-4">View Current CV</a>
                                @endif
                            </div>
                        </div>

                        {{-- Personal Info --}}
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Name:</label>
                                <input class="form-control" type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}">
                                @error('name')
                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email:</label>
                                <input class="form-control" type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}">
                                @error('email')
                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Password:</label>
                                <input class="form-control" type="password" id="password" name="password">
                                @error('password')
                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="confirm_password" class="form-label">Confirm Password:</label>
                                <input class="form-control" type="password" id="confirm_password" name="confirm_password">
                                @error('confirm_password')
                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Phone and City --}}
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="phone" class="form-label">Phone:</label>
                                <input class="form-control" type="text" id="phone" name="phone" value="{{ old('phone', auth()->user()->phone) }}">
                                @error('phone')
                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="city" class="form-label">City:</label>
                                <input class="form-control" type="text" id="city" name="city" value="{{ old('city', auth()->user()->city) }}">
                                @error('city')
                                    <span class="text-danger"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div> <!-- card-body -->
            </div> <!-- card -->
        </div>
    </div>
</div>
@endsection
