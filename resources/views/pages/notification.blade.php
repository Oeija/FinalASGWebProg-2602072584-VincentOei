@extends('layout.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center" style="color: #4c0c7c;">Notifications</h2>

    <!-- Tab Navigation -->
    <ul class="nav nav-tabs" id="notificationTab" role="tablist" style="border-bottom: 2px solid #e578b6;">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="chat-tab" data-bs-toggle="tab" href="#chat" role="tab" aria-controls="chat" aria-selected="true" style="color: #4c0c7c;">
                <i class="fas fa-comment-dots"></i> Chat
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="friend-request-tab" data-bs-toggle="tab" href="#friend-request" role="tab" aria-controls="friend-request" aria-selected="false" style="color: #4c0c7c;">
                <i class="fas fa-user-friends"></i> Friend Request
            </a>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-3" id="notificationTabContent">

        <!-- Chat Notifications -->
        <div class="tab-pane fade show active" id="chat" role="tabpanel" aria-labelledby="chat-tab">
            <ul class="list-group">
                @forelse ($chatNotification as $notification)
                <li class="list-group-item d-flex justify-content-between align-items-center hover-effect" style="border-left: 5px solid #e578b6; background-color: #efefef;">
                    <div>
                        <strong>{{ $notification->sender->name }}:</strong> {{ Str::limit($notification->message, 125, '..') }}
                        <small class="text-muted d-block">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</small>
                    </div>
                    <a href="{{ route('chatPage', ['current_chat_id'=>$notification->sender->id]) }}" class="btn btn-outline-primary btn-sm" style="background-color: #856497; color: #fff;">See</a>
                </li>
                @empty
                <div class="alert alert-warning text-center" role="alert" style="background-color: #dc2c54; color: #fff;">
                    No chat notifications available.
                </div>
                @endforelse
            </ul>
        </div>

        <!-- Friend Request Notifications -->
        <div class="tab-pane fade" id="friend-request" role="tabpanel" aria-labelledby="friend-request-tab">
            <ul class="list-group">
                @forelse ($friendRequestNotification as $notification)
                <li class="list-group-item d-flex justify-content-between align-items-center hover-effect" style="border-left: 5px solid #e578b6; background-color: #efefef;">
                    <div>
                        <strong>{{ $notification->name }}</strong> sent you a friend request.
                    </div>
                    <div>
                        <a href="{{ route('friendRequestPage') }}" class="btn btn-outline-primary btn-sm" style="background-color: #856497; color: #fff;">See</a>
                    </div>
                </li>
                @empty
                <div class="alert alert-warning text-center" role="alert" style="background-color: #dc2c54; color: #fff;">
                    No friend request notifications available.
                </div>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection