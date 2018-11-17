@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('listing_create', 'Reset Password') }}
    <div class="w-full flex justify-center mt-6">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex-grow max-w-xs"
              method="POST" action="{{ route('password.update') }}">
            @csrf
            <h2 class="mb-2 text-grey-darker">Reset Password</h2>
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-2">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{$errors->has('email') ? ' border-red mb-2' : ''}}"
                    id="email" type="email" name="email" placeholder="Email"
                    value="{{ $email ?? old('email') }}" required>
                @if ($errors->has('email'))
                    <p role="alert"
                       class="text-red text-xs italic">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="mb-2">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{$errors->has('password') ? ' border-red mb-2' : ''}}"
                    id="password" type="password" name="password" required
                    placeholder="******************">
                @if ($errors->has('password'))
                    <p class="text-red text-xs italic">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="mb-5">
                <label class="block text-grey-darker text-sm font-bold mb-2"
                       for="password_confirmation">
                    Confirm Password
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{$errors->has('password') ? ' border-red mb-2' : ''}}"
                    id="password_confirmation" type="password" name="password_confirmation"
                    required
                    placeholder="******************">
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-green hover:bg-green-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
@endsection
