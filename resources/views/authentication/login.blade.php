<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect Friend Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #efefef;
            background-image: linear-gradient(135deg, #dc2c54 25%, #e578b6 25%, #e578b6 50%, #4c0c7c 50%, #4c0c7c 75%, #856497 75%);
            background-size: 56px 56px;
        }

        .card {
            background-color: #ffffff;
            border: none;
            border-radius: 15px;
        }

        .btn-primary {
            background-color: #4c0c7c;
            border-color: #4c0c7c;
        }

        .btn-primary:hover {
            background-color: #856497;
            border-color: #856497;
        }

        a {
            color: #dc2c54;
        }

        a:hover {
            color: #e578b6;
            text-decoration: underline;
        }

        h2 {
            color: #4c0c7c;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 shadow-lg" style="width: 100%; max-width: 400px;">
            <h2 class="text-center mb-4">@lang('lang.login')</h2>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="@lang('lang.email_placeholder')">
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="@lang('lang.password_placeholder')">
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary w-100">@lang('lang.login')</button>
                <div class="text-center mt-3">
                    <p>@lang('lang.dont_have_account') <a href="{{ route('registerPage') }}">@lang('lang.register')</a></p>
                </div>
            </form>
            <div class="text-center mt-3">
                <p class="mb-0">
                    @lang('lang.back_to')
                    <a href="{{ route('homePage') }}">@lang('lang.home')</a>
                </p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>