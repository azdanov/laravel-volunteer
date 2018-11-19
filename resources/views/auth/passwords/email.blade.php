@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('form', 'Request Password Reset') }}

    <div class="form-outer">
        <form class="form-inner" method="POST" action="{{ route('password.email') }}">
            @csrf
            <h2 class="form-title">Reset Password</h2>
            <div class="mb-4">
                <label class="form-label" for="email">
                    Email
                </label>
                <input class="form-input{{$errors->has('email') ? ' form-input--error' : ''}}"
                       id="email" type="email" name="email" placeholder="Email"
                       value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <p class="form-error-text" role="alert">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <button class="form-button w-full" type="submit">
                Send Password Reset Link
            </button>
        </form>
    </div>
@endsection
