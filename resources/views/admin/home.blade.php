@extends('admin.Layout.dashboard')
@section('content')
    <section id="home">
        <div class="container pt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 d-none d-sm-none d-md-block d-lg-block d-xl-block">
                                        <img class="img-fluid" src="https://pagaments.inscamidemar.cat/images/logo_2.png" alt="logo Camí de Mar">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xl-6 benvingut">
                                        {{-- <h1 class="text-center">Benvingut {{ $user->name }}!</h1> --}}
                                        <h1 class="text-center">Benvingut {{ auth()->user()->name }}!</h1>
                                    </div>
                                </div>
                                <div class="alert alert-warning mt-4" role="alert">
                                    <span class="h5">Ultima conexiò: </span>
                                    <p id="lastcon" class="mt-2"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection