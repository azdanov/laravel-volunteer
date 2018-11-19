@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('form', 'Register') }}

    <div class="form-outer">
        <form class="form-inner"
              method="POST"
              action="{{ route('register') }}">
            @csrf
            <h2 class="form-title">Register</h2>
            <div class="mb-2">
                <label class="form-label" for="name">
                    Name
                </label>
                <input
                    class="form-input{{$errors->has('name') ? ' form-input--error' : ''}}"
                    id="name" type="text" name="name" placeholder="Name"
                    value="{{ old('name') }}" required>
                @if ($errors->has('name'))
                    <p role="alert" class="form-error-text">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="mb-2">
                <label class="form-label" for="email">
                    Email
                </label>
                <input
                    class="form-input{{$errors->has('email') ? ' form-input--error' : ''}}"
                    id="email" type="email" name="email" placeholder="Email"
                    value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <p role="alert"
                       class="form-error-text">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="mb-2">
                <label class="form-label" for="password">
                    Password
                </label>
                <input
                    class="form-input{{$errors->has('password') ? ' form-input--error' : ''}}"
                    id="password" type="password" name="password" required
                    placeholder="******************">
                @if ($errors->has('password'))
                    <p class="form-error-text">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="mb-5">
                <label class="form-label"
                       for="password_confirmation">
                    Confirm Password
                </label>
                <input
                    class="form-input{{$errors->has('password') ? ' form-input--error' : ''}}"
                    id="password_confirmation" type="password" name="password_confirmation"
                    required
                    placeholder="******************">
            </div>
            <button
                class="bg-green hover:bg-green-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Register
            </button>
        </form>
    </div>
@endsection
