@extends('admin.Layout.dashboard')
@section('content')
<section class="categories">
    <div class="container pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Cursos
                            <a class="btn btn-danger float-right ml-2" href="/dashboard/cursos/exportPdf"><i class="fas fa-file-pdf"></i></a>
                            <a class="btn btn-success float-right" href="/dashboard/cursos/exportExel"><i class="fas fa-file-excel"></i></a>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                {{-- Go content tabla --}}
                                <li class="nav-item" role="presentation">
                                  <a class="nav-link active" id="table-tab" data-toggle="tab" href="#table" role="tab" aria-controls="table" aria-selected="true">Taula</a>
                                </li>
                                {{-- Go content add value --}}
                                <li class="nav-item" role="presentation">
                                  <a class="nav-link" id="afegirRegistre-tab" data-toggle="tab" href="#afegirRegistre" role="tab" aria-controls="afegirRegistre" aria-selected="false">Afegir Registre</a>
                                </li>
                              </ul>
                              <div class="tab-content my-4" id="myTabContent">
                                {{-- Content tabla --}}
                                <div class="tab-pane fade show active" id="table" role="tabpanel" aria-labelledby="table-tab">
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th data-priority="2" scope="col">Id</th>
                                                <th data-priority="1" scope="col">Cursos</th>
                                                <th data-priority="2" scope="col">Ultima modificació</th>
                                                <th data-priority="1" scope="col">Estat</th>
                                                <th data-priority="2" scope="col">Accio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cursos as $curs)
                                                <tr>
                                                    <th scope="row">{{$curs->id}}</th>
                                                    <td>{{$curs->curs}}</td>
                                                    <td>{{$curs->updated_at->diffForHumans()}}</td>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" @if($curs->estat == true)checked @endif class="custom-control-input" name="{{ $curs->id }}" id="estatCategories{{ $curs->id }}">
                                                            <label class="custom-control-label" for="estatCategories{{ $curs->id }}"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button id="editData{{ $curs->id }}" class="btn" data-toggle="modal" data-target="#modalData{{ $curs->id }}"><i class="fas fa-edit text-success"></i></button>
                                                        <button id="delData{{ $curs->id }}" class="btn" data-toggle="modal" data-target="#modalDel{{ $curs->id }}"><i class="fas fa-trash text-danger"></i></button>
                                                    </td>
                                                    {{-- Modal Editar Campo --}}
                                                    <div class="modal fade" id="modalData{{ $curs->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="modalDataLabel">Editar {{ $curs->curs }}</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                              </button>
                                                            </div>
                                                            {{-- Form modal --}}
                                                            <form action="/dashboard/cursos/edit/{{ $curs->id }}" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-8">
                                                                            <label for="curs">Curs</label>
                                                                            <input type="text" class="form-control" id="cursEdit" name="cursEdit" placeholder="Nom del curs" value="{{ $curs->curs }}" required>
                                                                        </div>
                                                                    </div>
                                                                    @csrf
                                                                    {{-- End form modal --}}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                    <button type="submit" class="btn btn-success">Actualitzar</button>
                                                                </div>
                                                            </form>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    {{-- End Modal Editar Campo --}}
                                                    {{-- Modal Delete --}}
                                                    <div class="modal fade" id="modalDel{{ $curs->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalDelLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="modalDelLabel">Eliminar {{ $curs->curs }}</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                              </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Estas segur que vols eliminar el curs {{ $curs->curs }}?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                <a id="delcurs" href="/dashboard/cursos/delete/{{$curs->id}}" class="btn btn-success">Eliminar</a>
                                                            </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    {{-- End Modal Delete --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- End content tabla --}}
                                {{-- Content add value --}}
                                <div class="tab-pane fade" id="afegirRegistre" role="tabpanel" aria-labelledby="afegirRegistre-tab">
                                    <form action="/dashboard/cursos/add" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="curs">Curs</label>
                                                <input type="text" class="form-control" id="curs" name="curs" placeholder="Nom del curs" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="Estat">Estat</label>
                                                <select class="form-control"  name="estat" id="Estat" placeholder="Estat">
                                                    <option value="1">Actiu</option>
                                                    <option value="0">Inactiu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Afegir</button>
                                        @csrf
                                    </form>
                                </div>
                                {{-- End content add value --}}
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection