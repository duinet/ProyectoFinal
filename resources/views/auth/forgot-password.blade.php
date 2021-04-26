@extends('Layout.plantilla')
@section('content')

<div class="resetpass">
    <form method="POST" action="" class="pt-4 ms-5">
        @csrf
        <!-- Email Address -->
        <div class="col-4 pt-3">
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 form-control" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <div class=" mt-4">
            <x-button class="mt-3 mb-3 btn btn-primary me-3">
                {{ __('Restablir contrasenya') }}
            </x-button>
        </div>
    </form>
</div>
@endsection
