<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect Friend Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #efefef;
            background-image: linear-gradient(135deg, #dc2c54 25%, #e578b6 25%, #e578b6 50%, #4c0c7c 50%, #4c0c7c 75%, #856497 75%);
            background-size: 56px 56px;
        }

        .modal-dialog-centered {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background-color: #ffffff;
            border: none;
            border-radius: 15px;
        }

        .btn-success {
            background-color: #4c0c7c;
            border-color: #4c0c7c;
        }

        .btn-success:hover {
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
        <div class="card p-4 shadow-lg" style="width: 100%; max-width: 500px;">
            <h2 class="text-center mb-4">@lang('lang.register')</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">@lang('lang.full_name')</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="@lang('lang.full_name_placeholder')" value="{{ old('name') }}">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="@lang('lang.email_placeholder')" value="{{ old('email') }}">
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
                <div class="mb-3">
                    <label for="gender" class="form-label">@lang('lang.gender')</label>
                    <select class="form-select" id="gender" name="gender">
                        <option value="" disabled selected>@lang('lang.gender_placeholder')</option>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : ''}}>@lang('lang.male')</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : ''}}>@lang('lang.female')</option>
                    </select>
                    @error('gender')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="hobbies" class="form-label">@lang('lang.hobbies')</label>
                    <input type="text" class="form-control" id="hobbies" name="hobbies" placeholder="@lang('lang.hobbies_placeholder')" value="{{ old('hobbies') }}">
                    @error('hobbies')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="instagram_username" class="form-label">@lang('lang.instagram_username')</label>
                    <input type="text" class="form-control" id="instagram_username" name="instagram_username" placeholder="https://www.instagram.com/username" value="{{ old('instagram_username') }}">
                    @error('instagram_username')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">@lang('lang.phone_number')</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="@lang('lang.phone_number_placeholder')" value="{{ old('phone_number') }}">
                    @error('phone_number')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success w-100">@lang('lang.register')</button>
                <div class="text-center mt-3">
                    <p>@lang('lang.already_have_account') <a href="{{ route('loginPage') }}" class="text-decoration-none">@lang('lang.login')</a></p>
                </div>
            </form>
            <div class="text-center mt-3">
                <p class="mb-0">
                    @lang('lang.back_to')
                    <a href="{{ route('homePage') }}" class="text-decoration-none">@lang('lang.home')</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Payment and Overpaid Modals -->
    @if (session('payment') == true)
    <div class="modal fade" id="payment" tabindex="-1" aria-labelledby="paymentModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ route('payment') }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="paymentModal">Payment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Registration Fee: <strong>Rp {{ session('registration_fee') }}</strong></p>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Enter Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter the fee amount" value="{{ old('amount') }}">
                        @error('amount')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submitPayment">Pay</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var paymentModal = new bootstrap.Modal(document.getElementById('payment'));
            paymentModal.show();
        });
    </script>
    @endif

    @if (session('overpaid'))
    <div class="modal fade" id="overpaid" tabindex="-1" aria-labelledby="overpaidModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{ route('overpaidPayment') }}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="overpaidModal">Overpaid</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>You just overpaid <strong>{{ session('overpaid') }}</strong>, would you like to enter a balance?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary" id="submitPayment">Yes</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var overpaidModal = new bootstrap.Modal(document.getElementById('overpaid'));
            overpaidModal.show();
        });
    </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>