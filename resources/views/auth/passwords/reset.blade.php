@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('generic', 'Reset Password') }}

    <div class="form-outer">
        <form class="form-inner"
              method="POST" action="{{ route('password.update') }}">
            @csrf
            <h2 class="form-title">Reset Password</h2>
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-2">
                <label class="form-label" for="email">
                    Email
                </label>
                <input class="form-input{{$errors->has('email') ? ' form-input--error' : ''}}"
                       id="email" type="email" name="email" placeholder="Email"
                       value="{{ $email ?? old('email') }}" required>
                @if ($errors->has('email'))
                    <p role="alert"
                       class="form-error-text">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="mb-2">
                <label class="form-label" for="password">
                    Password
                </label>
                <input class="form-input{{$errors->has('password') ? ' form-input--error' : ''}}"
                       id="password" type="password" name="password" required
                       placeholder="******************">
                @if ($errors->has('password'))
                    <p class="form-error-text">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="mb-5">
                <label class="form-label" for="password_confirmation">
                    Confirm Password
                </label>
                <input class="form-input{{$errors->has('password') ? ' form-input--error' : ''}}"
                       id="password_confirmation" type="password" name="password_confirmation"
                       required
                       placeholder="******************">
            </div>
            <button class="form-button" type="submit">
                Reset Password
            </button>
        </form>
    </div>
@endsection
