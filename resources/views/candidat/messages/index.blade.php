@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="card">
                    <div class="body">
                        <div id="plist" class="people-list">
                            <div class="chat-search">
                                <input type="text" class="form-control" placeholder="Search..." />
                            </div>
                            <div class="m-b-20">
                                <div id="chat-scroll">
                                    <ul class="chat-list list-unstyled m-b-0">
                                        <li class="clearfix active">
                                            <img src="{{ asset('assets/img/users/user-4.png') }}" alt="avatar">
                                            <div class="about">
                                                <div class="name">William Smith</div>
                                                <div class="status">
                                                    <i class="material-icons offline">fiber_manual_record</i>
                                                    left 7 mins ago
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix ">
                                            <img src="{{ asset('assets/img/users/user-1.png') }}" alt="avatar">
                                            <div class="about">
                                                <div class="name">Martha Williams</div>
                                                <div class="status">
                                                    <i class="material-icons offline">fiber_manual_record</i>
                                                    online
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <img src="{{ asset('assets/img/users/user-2.png') }}" alt="avatar">
                                            <div class="about">
                                                <div class="name">Joseph Clark</div>
                                                <div class="status">
                                                    <i class="material-icons online">fiber_manual_record</i>
                                                    online
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <img src="{{ asset('assets/img/users/user-3.png') }}" alt="avatar">
                                            <div class="about">
                                                <div class="name">Nancy Taylor</div>
                                                <div class="status">
                                                    <i class="material-icons online">fiber_manual_record</i>
                                                    online
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <img src="{{ asset('assets/img/users/user-4.png') }}" alt="avatar">
                                            <div class="about">
                                                <div class="name">Margaret Wilson</div>
                                                <div class="status">
                                                    <i class="material-icons online">fiber_manual_record</i>
                                                    online
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <img src="{{ asset('assets/img/users/user-5.png') }}" alt="avatar">
                                            <div class="about">
                                                <div class="name">Joseph Jones</div>
                                                <div class="status">
                                                    <i class="material-icons offline">fiber_manual_record</i>
                                                    left 30 mins ago
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <img src="{{ asset('assets/img/users/user-6.png') }}" alt="avatar">
                                            <div class="about">
                                                <div class="name">Jane Brown</div>
                                                <div class="status">
                                                    <i class="material-icons offline">fiber_manual_record</i>
                                                    left 10 hours ago
                                                </div>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <img src="{{ asset('assets/img/users/user-2.png') }}" alt="avatar">
                                            <div class="about">
                                                <div class="name">Eliza Johnson</div>
                                                <div class="status">
                                                    <i class="material-icons online">fiber_manual_record</i>
                                                    online
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <div class="card">
                    <div class="chat">
                        <div class="chat-header clearfix">
                            <img src="{{ asset('assets/img/users/user-1.png') }}" alt="avatar">
                            <div class="chat-about">
                                <div class="chat-with">Maria Smith</div>
                                <div class="chat-num-messages">2 new messages</div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-box" id="mychatbox">
                        <div class="card-body chat-content">
                        </div>
                        <div class="card-footer chat-form">
                            <form id="chat-form">
                                <input type="text" class="form-control" placeholder="Type a message">
                                <button class="btn btn-primary">
                                    <i class="far fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection()