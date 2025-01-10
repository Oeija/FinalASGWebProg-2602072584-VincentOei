@extends('layout.main')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Filter Sidebar -->
        <div class="col-md-3">
            <h5 class="text-center mb-4">Filter</h5>
            <form method="GET" action="{{ route('friendPage') }}">
                <div class="mb-3">
                    <label for="genderFilter" class="form-label">@lang('lang.gender')</label>
                    <select name="gender" id="genderFilter" class="form-select">
                        <option value="">@lang('lang.all')</option>
                        <option value="Male" {{ $gender_filter == 'Male' ? 'selected' : ''}}>@lang('lang.male')</option>
                        <option value="Female" {{ $gender_filter == 'Female' ? 'selected' : ''}}>@lang('lang.female')</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="hobbyFilter" class="form-label">@lang('lang.hobbies')</label>
                    <input type="text" name="hobbies" id="hobbyFilter" class="form-control" placeholder="@lang('lang.search')" value="{{ $hobbies_filter }}">
                </div>
                <button type="submit" class="btn btn-primary w-100">@lang('lang.apply_filter')</button>
            </form>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <h3 class="mb-4">@lang('lang.friend')</h3>
            <div class="row">
                @forelse ($users as $user)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm border-light">
                        <form method="POST" action="{{ route('addFriend', ['receiver_id'=>$user->id]) }}" class="card-body d-flex flex-column align-items-center">
                            @csrf
                            <!-- Profile Picture -->
                            <img src="{{ $user->profile_picture ?: asset('assets/images/default.jpg') }}"
                                class="rounded-circle mb-3"
                                alt="User Avatar"
                                style="height: 80px; width: 80px; object-fit: cover;">
                            <!-- User Name and Hobbies -->
                            <h5 class="card-title mb-1"><a href="{{ route('detailPage', ['user_id'=>$user->id]) }}">{{ $user->name }}</a></h5>
                            <p class="card-text mb-2 text-muted">{{ Str::limit(implode(', ', json_decode($user->hobbies, true)), 20, '...') }}</p>
                            <!-- Add Friend Button -->
                            <button type="submit" class="btn btn-primary btn-sm w-100">@lang('lang.add_friend')</button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <div class="alert alert-info pb-4">
                        <i class="bi bi-person-x-fill" style="font-size: 40px;"></i>
                        <h4 class="mt-2">@lang('lang.no_friends_available')</h4>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection