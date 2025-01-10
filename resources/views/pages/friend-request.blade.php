@extends('layout.main')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Main Content -->
        <div class="col-md-9 mx-auto">
            <h3 class="text-center mb-4">@lang('lang.friend_request')</h3>

            <!-- Tabs Navigation -->
            <ul class="nav nav-pills justify-content-center mb-4" id="friendTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active px-4 py-2" id="pending-tab" data-bs-toggle="pill" href="#pending" role="tab" aria-controls="pending" aria-selected="true">
                        @lang('lang.pending_request')
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link px-4 py-2" id="accepted-tab" data-bs-toggle="pill" href="#accepted" role="tab" aria-controls="accepted" aria-selected="false">
                        @lang('lang.accepted_friend')
                    </a>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="friendTabContent">
                <!-- Pending Requests Tab -->
                <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                    <div class="row g-3">
                        @foreach($pendingRequests as $user)
                        <div class="col-md-6 col-lg-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <img src="{{ asset('assets/images/default.jpg') }}"
                                        class="rounded-circle mb-3"
                                        alt="User Avatar"
                                        style="height: 100px; width: 100px; object-fit: cover;">
                                    <h5 class="card-title mb-2">{{ $user->name }}</h5>
                                    <p class="text-muted small mb-3">{{ Str::limit(implode(', ', json_decode($user->hobbies, true)), 20, '...') }}</p>
                                    <div class="d-flex justify-content-center gap-2">
                                        <form method="POST" action="{{ route('acceptFriend', ['sender_id'=>$user->id]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Accept</button>
                                        </form>
                                        <form method="POST" action="{{ route('rejectFriend', ['sender_id'=>$user->id]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Accepted Friends Tab -->
                <div class="tab-pane fade" id="accepted" role="tabpanel" aria-labelledby="accepted-tab">
                    <div class="row g-3">
                        @foreach($acceptedFriends as $friend)
                        <div class="col-md-6 col-lg-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <img src="{{ $friend->profile_picture ?: asset('assets/images/default.jpg') }}"
                                        class="rounded-circle mb-3"
                                        alt="User Avatar"
                                        style="height: 80px; width: 80px; object-fit: cover;">
                                    <h5 class="card-title mb-2">{{ $friend->name }}</h5>
                                    <p class="text-muted small mb-3">
                                        {{ Str::limit(implode(', ', json_decode($friend->hobbies, true)), 24, '...') }}
                                    </p>
                                    <a href="{{ route('chatPage', ['current_chat_id' => $friend->id]) }}" class="btn btn-success btn-sm">
                                        <i class="bi bi-chat-dots"></i> Chat
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection