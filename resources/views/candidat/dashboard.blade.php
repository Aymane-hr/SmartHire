@extends('layouts.app')

@section('title', 'Dashboard Candidat')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <h2>مرحبا بك {{ Auth::user()->name }} 👋</h2>
            <p class="text-muted">هادا هو لوحتك الشخصية كمترشح.</p>

            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    إحصائيات سريعة
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">عدد الطلبات المرسلة: <strong>{{ $applicationsCount ?? 0 }}</strong></li>
                        <li class="list-group-item">الرسائل الجديدة: <strong>{{ $messagesCount ?? 0 }}</strong></li>
                        <li class="list-group-item">الملف الشخصي مكتمل: 
                            <strong>
                                {{ $profileCompleted ?? false ? 'نعم ✅' : 'لا ❌' }}
                            </strong>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-4">
                <a href="" class="btn btn-outline-primary">شوف الطلبات ديالك</a>
                <a href="" class="btn btn-outline-secondary">شوف الرسائل</a>
                <a href="" class="btn btn-outline-success">حدّث الملف الشخصي</a>
            </div>
        </div>
    </div>
</div>
@endsection
