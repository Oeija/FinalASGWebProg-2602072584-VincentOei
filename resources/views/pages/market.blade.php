@extends('layout.main')

@section('content')
<div class="container mt-5">
    <!-- Header Section -->
    <div class="text-center mb-5">
        <h1 style="color: #4c0c7c; font-weight: bold;">@lang('lang.avatar_shop')</h1>
        <p style="color: #856497;">@lang('lang.avatar_shop_tag')</p>
    </div>

    <!-- Market Items -->
    <div class="row gy-4">
        @foreach($avatars as $avatar)
        <div class="col-md-4">
            <div class="card shadow-lg border-0" style="background-color: #efefef; border-radius: 15px;">
                <!-- Avatar Image -->
                <div class="card-img-top d-flex justify-content-center align-items-center" style="background-color: #be98b4; height: 200px; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <img src="{{ asset($avatar->path) }}" alt="{{ $avatar->name }}" style="max-height: 180px; max-width: 100%; object-fit: contain;">
                </div>

                <!-- Card Body -->
                <div class="card-body text-center">
                    <h5 class="card-title" style="color: #4c0c7c; font-weight: bold;">{{ $avatar->name }}</h5>
                    <p class="card-text" style="color: #856497;">{{ $avatar->description }}</p>
                    <p class="text-primary fw-bold" style="color: #dc2c54;">{{ $avatar->price }} Coins</p>

                    <!-- Purchase Button -->
                    @if (Auth::user()->coin >= $avatar->price)
                    <form method="POST" action="{{ route('purchaseAvatar', ['avatar_id'=>$avatar->id]) }}">
                        @csrf
                        <button type="submit" class="btn" style="background-color: #4c0c7c; color: #fff;">@lang('lang.buy_now')</button>
                    </form>
                    @else
                    <button class="btn btn-secondary btn-sm" disabled>@lang('lang.insufficient_coins')</button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-5">
        {{ $avatars->links() }}
    </div>
</div>
@endsection