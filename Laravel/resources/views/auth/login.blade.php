@extends('layouts.auth')

@section('content')

    <style type="text/css">
        .login-form{
            padding: 45px;
            background: #ffffff;
            box-shadow: 0px 1px 5px 1px #dddddd;
            margin: 130px 40px 40px;
            border-radius: 6px;
        }
        @media only screen and (max-width: 600px) {
            .login-form {
                padding: 30px;
                margin: 100px 0px 0px;
                border-radius: 0px;
            }
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf
                    <div class="form-group">
                        <x-label for="email" :value="__('Email')" />
                        <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="from-group">
                        <x-label for="password" :value="__('Password')" />
                        <x-input id="password" class="form-control"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="mt-4">
                        <x-button class="">
                            {{ __('Log in') }}
                        </x-button>
                        @if (Route::has('password.request'))
                            <a class="ml-5" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif                        
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
