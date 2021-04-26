@extends('Layout.plantilla')
@section('content')
    <div id="descriptionHome" class="p-3 px-5">
        <div class="row">
            @foreach($arrayCurs as $curs)
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <h2 class="mt-4 mb-3 fs-2">{{ $curs }}</h2>
                    <div class="ms-4">
                        @foreach($pagaments as $pagament)
                            @if($pagament->curs == $curs)
                                <a href="/tipopagos/pago/{{ $pagament->id }}" class="text-decoration-none"><p>{{ $pagament->pagament }}</p></a> 
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection