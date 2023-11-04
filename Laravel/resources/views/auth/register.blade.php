@extends('layouts.auth')

@section('content')
    <style type="text/css">
        .register-form{
            padding: 45px;
            background: #ffffff;
            box-shadow: 0px 1px 5px 1px #dddddd;
            margin: 70px 40px;
            border-radius: 6px;
        }
         @media only screen and (max-width: 600px) {
            .register-form {
                padding: 30px;
                margin: 60px 0px 0px;
                border-radius: 0px;
            }
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="POST" action="{{ route('register') }}" class="register-form">
                    @csrf
                    <div class="form-group">
                        <x-label for="name" :value="__('Name')" />

                        <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="form-group">
                        <x-label for="email" :value="__('Email')" />
                        <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <x-label for="password" :value="__('Password')" />
                        <x-input id="password" class="form-control"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-input id="password_confirmation" class="form-control"
                                        type="password"
                                        name="password_confirmation" required />
                    </div>

                    <div class="mt-4">
                        <x-button class="">
                            {{ __('Register') }}
                        </x-button>
                        <a class="ml-4" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
