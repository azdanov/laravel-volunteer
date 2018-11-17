@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('form', 'Send Password Reset') }}

    <div class="w-full flex justify-center mt-6">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex-grow max-w-xs"
              method="POST" action="{{ route('password.email') }}">
            @csrf
            <h2 class="mb-2 text-grey-darker">Reset Password</h2>
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-3" for="email">
                    Email
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{$errors->has('email') ? ' border-red mb-2' : ''}}"
                    id="email" type="email" name="email" placeholder="Email"
                    value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <p class="text-red text-xs italic"
                       role="alert">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <button
                class="bg-green hover:bg-green-dark text-white font-bold py-2 px-4 min-w-full rounded focus:outline-none focus:shadow-outline"
                type="submit"
            >
                Send Password Reset Link
            </button>
        </form>
    </div>
@endsection
