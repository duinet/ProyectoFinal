@extends('Layout.plantilla')
@section('content')
<div class="formlogin">
    <form method="POST" action="{{ route('login') }}" class="pt-4 ms-3 ms-sm-3 ms-md-4 ms-lg-5 ms-xl-5">
        @csrf
        @if($errors->any())
            <div class="col-4">
                <p class="alert alert-danger">{{$errors->first()}}</p>
            </div>
        @endif
        <!-- Email Address -->
        <div class="col-9 col-sm-9 col-md-8 col-lg-4 col-xl-4">
            <x-label for="email" :value="__('Email')" class="form-label"/>
            <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <!-- Password -->
        <div class="mt-4 col-9 col-sm-9 col-md-8 col-lg-4 col-xl-4">
            <x-label for="password" :value="__('Password')" />

            <x-input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="form-label">
                <input id="remember_me" type="checkbox" class="" name="remember">
                <span class="">{{ __("Recorda'm") }}</span>
            </label>
        </div>

        <div class="h-captcha" data-sitekey="1740f72e-8b6b-4fd9-8034-fa06bd84e2a7"></div>

        <div class="form-group">
            <div class="col-8">
                <x-button class="mt-3 mb-3 btn btn-primary">
                    {{ __('Log in') }}
                </x-button>
                <a class="text-decoration-none ms-2" href="/forgot-password">
                    Has oblidat la contrasenya?
                </a>
                {{-- <div class="">
                    <a href="{{ url('/auth/google') }}" class="btn btn-google"><i class="fab fa-google"></i> Iniciar amb Google</a>
                </div> --}}
            </div>
        </div>
    </form>
</div>
@endsection