@extends('Layout.plantilla')
@section('content')
<div class="formlogin">
    <form method="POST" action="{{ route('password.update') }}" class="pt-4 ms-3 ms-sm-3 ms-md-4 ms-lg-5 ms-xl-5">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="col-9 col-sm-9 col-md-8 col-lg-4 col-xl-4">
            <x-label for="email" :value="__('Email')" class="form-label" />
            <x-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus />
        </div>

        <!-- Password -->
        <div class="mt-4 col-9 col-sm-9 col-md-8 col-lg-4 col-xl-4">
            <x-label for="password" :value="__('Password')" class="form-label" />
            <x-input id="password" class="form-control" type="password" name="password" required />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 col-9 col-sm-9 col-md-8 col-lg-4 col-xl-4">
            <x-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />

            <x-input id="password_confirmation" class="form-control"
                                type="password"
                                name="password_confirmation" required />
        </div>

        <div class="form-group">
            <x-button class="mt-4 mb-3 btn btn-primary">
                {{ __('Restablir contrasenya') }}
            </x-button>
        </div>
    </form>
@endsection

