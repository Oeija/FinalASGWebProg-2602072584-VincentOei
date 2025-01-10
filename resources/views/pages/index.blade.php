@extends('layout.main')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #e578b6, #be98b4, #4c0c7c);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
    }

    @keyframes gradientBG {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .container {
        color: #434443;
    }

    h1 {
        color: #efefef;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    p {
        color: #efefef;
    }

    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 2px solid #856497;
        border-radius: 15px;
        background-color: #efefef;
    }

    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        border-color: #dc2c54;
    }

    .card-title {
        color: #4c0c7c;
        font-weight: 600;
    }

    .card-text {
        color: #856497;
    }

    .btn-primary {
        background-color: #dc2c54;
        border: none;
        color: #fff;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #e578b6;
        color: #434443;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
</style>

<div class="container mt-4">
    <div class="text-center mb-4">
        <h1>@lang('lang.welcome_to_connect_friend')</h1>
        <p>@lang('lang.find_friends_based_on_your_hobbies')</p>
    </div>
    <div class="row" id="userGallery">
        @foreach($users as $user)
        <div class="col-md-4 mb-4">
            <a href="{{ route('detailPage', ['user_id'=>$user->id]) }}" class="text-decoration-none text-body">
                <div class="card text-center card-hover">
                    <div class="d-flex justify-content-center mt-4">
                        <img src="{{ $user->profile_picture ?: asset('assets/images/default.jpg') }}" class="card-img-top rounded-circle border border-3" alt="User Photo" style="width: 150px; height: 150px; border-color: #dc2c54;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">@lang('lang.hobby'): {{ Str::limit(implode(', ', json_decode($user->hobbies, true)), 30, '...') }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('friendPage') }}" class="btn btn-primary">@lang('lang.see_more')</a>
    </div>
</div>
@endsection