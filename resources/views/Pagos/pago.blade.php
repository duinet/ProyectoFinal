@extends('Layout.plantilla')
@section('content')
    <div id="descriptionHome" class="p-3 px-5">
        <div class="pago">
            <h2 class="mt-3 mb-3">{{$pagament->pagament}}</h2>
            <p>Benvolgudes famílies.</p> 
            <p>Podeu fer l'ingrés de <strong>{{$pagament->preu}}€</strong> en concepte de {{$pagament->pagament}}.</p>
            <p>{!! $pagament->descripcio !!}</p>
            <p>IMPORT: <strong>20€</strong></p>
            {{-- fijo --}}
            <p>Atentament <a href="#" class="text-decoration-none">INS Camí de Mar</a href="#" class="text-decoration-none"></p>
            <form action="https://sis.sermepa.es/sis/realizarPago" method="post" accept-charset="utf-8" id="form_260"> 
                <input type="hidden" name="Ds_SignatureVersion" value="HMAC_SHA256_V1" /> 
                <input type="hidden" name="Ds_MerchantParameters" value="eyJEU19NRVJDSEFOVF9BTU9VTlQiOiIyMDAwMCIsIkRTX01FUkNIQU5UX09SREVSIjoiMjAwMjI3MTAyOTU0IiwiRFNfTUVSQ0hBTlRfTUVSQ0hBTlRDT0RFIjoiMDIyMzE2Nzk5MCIsIkRTX01FUkNIQU5UX0NVUlJFTkNZIjoiOTc4IiwiRFNfTUVSQ0hBTlRfVFJBTlNBQ1RJT05UWVBFIjoiMCIsIkRTX01FUkNIQU5UX1RFUk1JTkFMIjoiMSIs" />
                <button type="submit" class="btn btn-primary">Fer pagament</button>
            </form>
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