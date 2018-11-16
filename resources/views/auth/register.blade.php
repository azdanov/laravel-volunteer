@extends('layouts.app')

@section('content')
    <div class="w-full flex justify-center mt-6 mb-3">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex-grow max-w-xs"
              method="POST"
              action="{{ route('register') }}">
            @csrf
            <h2 class="mb-2 text-grey-darker">Register</h2>
            <div class="mb-2">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{$errors->has('name') ? ' border-red mb-2' : ''}}"
                    id="name" type="text" name="name" placeholder="Name"
                    value="{{ old('name') }}" required>
                @if ($errors->has('name'))
                    <p role="alert" class="text-red text-xs italic">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="mb-2">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline{{$errors->has('email') ? ' border-red mb-2' : ''}}"
                    id="email" type="email" name="email" placeholder="Email"
                    value="{{ old('email') }}" required>
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
                    Register
                </button>
            </div>
        </form>
    </div>
@endsection
