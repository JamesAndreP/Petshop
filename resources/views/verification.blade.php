@extends('register-template')
@section('title', 'Verification')
@section('content')
    <form 
        class="login100-form validate-form" 
        action="{{url('/verify-email')}}"
        method="post"
    >
        @csrf
        <span class="login100-form-title">
            Verify Email
        </span>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <x-error />
        <div class="verification_container">
            <center>
                A verification code was sent to your email.
            </center>
            <input 
                type="text" 
                name="verification_code"
                class="verification_code" 
                autocomplete="off" 
                required="required"
                maxlength="6"
                >
        </div>
        <div class="container-login100-form-btn" style="padding-bottom: 30px">
            <button type="submit" class="register-button">
                Verify
            </button>
        </div>
    </form>
@endsection

