@extends('admin.Layout.dashboard')
@section('content')
<section class="categories">
    <div class="container pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Descripciones de los pagos
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th data-priority="1" scope="col">Descripció</th>
                                        <th data-priority="2" class="no-sort" scope="col">Accio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personas as $persona)
                                        <tr>
                                            <th scope="row">{{$persona->id}}</th>
                                            <td>{{$persona->descripcio}}</td>
                                            <td>
                                                <button id="delData{{ $persona->id }}" class="btn" data-toggle="modal" data-target="#modalDel{{ $persona->id }}"><i class="fas fa-trash text-danger"></i></button>
                                            </td>
                                            {{-- Modal Delete --}}
                                            <div class="modal fade" id="modalDel{{ $persona->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalDelLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalDelLabel">Desitges eliminar?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Estas segur que vols eliminar la descripcio {{ $persona->descripcio }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                        <a id="delPersona" href="/dashboard/personapago/delete/{{$persona->id}}" class="btn btn-success">Eliminar</a>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Modal Delete --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- End content tabla --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection