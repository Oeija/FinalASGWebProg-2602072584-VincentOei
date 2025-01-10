@extends('layout.main')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh; background: linear-gradient(135deg, #4c0c7c, #e578b6);">
    <div class="text-center p-4 rounded shadow" style="width: 350px; background: rgba(239, 239, 239, 0.9); border-radius: 15px;">
        <h1 class="mb-3" style="color: #dc2c54; font-weight: bold;">Top Up Coins</h1>

        @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
        @endif

        <p style="color: #434443; font-weight: 500;">Your current balance:</p>
        <h2 style="color: #4c0c7c;">{{ Auth::user()->coin }} coins</h2>

        <form method="POST" action="{{ route('topup') }}">
            @csrf
            <button type="submit" class="btn btn-primary mt-3"
                style="background-color: #dc2c54; border-color: #dc2c54; border-radius: 10px; padding: 10px 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                Top Up 100 Coins
            </button>
        </form>

        <p class="mt-3">
            <a href="{{ route('marketPage') }}" style="color: #e578b6; text-decoration: underline; font-weight: bold;">
                Explore the Shop for Avatars!
            </a>
        </p>
    </div>
</div>
@endsection