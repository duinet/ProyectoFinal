@extends('Layout.plantilla')
@section('content')
    <div id="descriptionHome" class="p-3 px-5">
        <div class="pago">
            {{-- <h2 class="mt-3 mb-3">{{$pagament->pagament}}</h2> --}}
            <h2 class="mt-3 mb-3">Fiança projecte reciclatge de llibres Cicles formatius</h2>
            <p>Benvolgudes famílies.</p> 
            {{-- <p>Podeu fer l'ingrés de <strong>{{$pagament->preu}}€</strong> en concepte de {{$pagament->pagament}}.</p> --}}
            <p>Podeu fer l'ingrés de <strong>20€</strong> en concepte de Fiança projecte reciclatge de llibres Cicles formatius.</p>
            {{-- <p>{{$pagament->descripcio}}</p> --}}
            <p>No us oblideu d'enviar el comprovant bancari a l'adreça llibres@inscamidemar.cat i anotar el nom i cognoms de l'alumne/a al cos o a l'assumpte del missatge</p>
            <p>IMPORT: <strong>20€</strong></p>
            {{-- fijo --}}
            <p>Atentament <a href="#" class="text-decoration-none">INS Camí de Mar</a href="#" class="text-decoration-none"></p>
            <a href="#" class="text-decoration-none">Fer pagament</a>
        </div>
        <div class="social mt-4">
            {{-- telegram icons --}}
            <a href=""><i class="fab fa-telegram me-3 display-6"></i></a>
            {{-- whatssap icons --}}
            <a href=""><i class="fab fa-whatsapp me-3 display-6"></i></a>
            {{-- twitter icons --}}
            <a href=""><i class="fab fa-twitter me-3 display-6"></i></a>
            {{-- facebook icons --}}
            <a href=""><i class="fab fa-facebook me-3 display-6"></i></a>
        </div>
    </div>
@endsection