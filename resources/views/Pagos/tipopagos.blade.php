@extends('Layout.plantilla')
@section('content')
    <div id="descriptionHome" class="p-3 px-5">
        <div class="row">
            {{-- @foreach($arrayCurs as $curs) --}}
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    {{-- <h2 class="mt-4 mb-3 fs-2">{{ $curs }}</h2> --}}
                    <h2 class="mt-4 mb-3 fs-2">ESO</h2>
                    <div class="ms-4">
                        {{-- @foreach($pagaments as $pagament) --}}
                            {{-- @if($pagament->curs == $curs) --}}
                                {{-- <a href="/tipopagos/pago/{{ $pagament->id }}" class="text-decoration-none"><p>{{ $pagament->pagament }}</p></a>  --}}
                                <a href="/tipopagos/pago" class="text-decoration-none"><p>DESPESES ESCOLARS</p></a> 
                                <a href="/tipopagos/pago" class="text-decoration-none"><p>SEGON PAGAMENT SORTIDA ESQUÍ/SNOW 3HORES DE MONITOR</p></a> 
                                <a href="/tipopagos/pago" class="text-decoration-none"><p>SEGON PAGAMENT ESQUIADA CURS ESQUÍ/SNOW 5 HORES</p></a> 
                                <a href="/tipopagos/pago" class="text-decoration-none"><p>OBRA DE TEATRE ANGLÈS</p></a> 
                            {{-- @endif --}}
                        {{-- @endforeach --}}
                    </div>
                </div>
            {{-- @endforeach --}}
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    {{-- <h2 class="mt-4 mb-3 fs-2">{{ $curs }}</h2> --}}
                    <h2 class="mt-4 mb-3 fs-2">BAT</h2>
                    <div class="ms-4">
                        {{-- @foreach($pagaments as $pagament) --}}
                            {{-- @if($pagament->curs == $curs) --}}
                                {{-- <a href="/tipopagos/pago/{{ $pagament->id }}" class="text-decoration-none"><p>{{ $pagament->pagament }}</p></a>  --}}
                                <a href="/tipopagos/pago" class="text-decoration-none"><p>VISITA AL PALAU DE LA MÚSICA I EXPOSICIÓ ESPRIU. SEGON BATXILLERAT</p></a> 
                                <a href="/tipopagos/pago" class="text-decoration-none"><p>ACTIVITAT PARC ZOOLÒGIC ALUMNES SEGON DE BATXILLERAT BIOLOGIA</p></a> 
                                <a href="/tipopagos/pago" class="text-decoration-none"><p>SORTIDA A GIRONA SOCIS DE L'AMPA 4.5 EUROS</p></a> 
                                <a href="/tipopagos/pago" class="text-decoration-none"><p>SORTIDA GIRONA ALUMNES QUE NO SÓN SOCIS DE L'AMPA 11.50</p></a> 
                            {{-- @endif --}}
                        {{-- @endforeach --}}
                    </div>
                </div>
            {{-- @endforeach --}}
        </div>
    </div>
@endsection