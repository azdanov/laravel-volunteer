@extends('layouts.app')

@section('content')
    <h2>Verify Your Email Address</h2>

    <div>
        @if (session('resent'))
            <div role="alert">
                A fresh verification link has been sent to your email address.
            </div>
        @endif

        <p>Before proceeding, please check your email for a verification link.</p>
        <p>If you did not receive the email <a href="{{ route('verification.resend') }}">click here
                to request another</a>.
        </p>
    </div>
@endsection
