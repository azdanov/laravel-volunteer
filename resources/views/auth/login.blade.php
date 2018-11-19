@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('form', 'Login') }}

    <div class="form-outer">
        <form class="form-inner"
              method="POST"
              action="{{ route('login') }}">
            @csrf
            <h2 class="form-title">Login</h2>
            <div class="mb-3">
                <label class="form-label" for="email">
                    Email
                </label>
                <input
                    class="form-input{{$errors->has('email') ? ' form-input--error' : ''}}"
                    id="email" type="email" name="email" placeholder="Email"
                    value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <p role="alert" class="form-error-text">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="mb-3">
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
            <div class="mb-4">
                <label class="md:w-2/3 block text-grey-darker font-bold flex items-baseline">
                    <input type="checkbox" name="remember" class="mr-2 leading-tight"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="text-sm">
                        Remember Me
                    </span>
                </label>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-green hover:bg-green-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Login
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-green hover:text-green-dark"
                   href="{{ route('password.request') }}">
                    Forgot Password?
                </a>
            </div>
        </form>
    </div>
@endsection
