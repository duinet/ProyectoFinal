@extends('admin.Layout.dashboard')
@section('content')
<section class="categories">
    <div class="container pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Comptes
                            <a class="btn btn-danger float-right ml-2" href="/dashboard/comptes/exportPdf"><i class="fas fa-file-pdf"></i></a>
                            <a class="btn btn-success float-right" href="/dashboard/comptes/exportExel"><i class="fas fa-file-excel"></i></a>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                                <div class="">
                                    <p class="alert alert-danger">{{$errors->first()}}</p>
                                </div>
                            @endif
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
                                                <th data-priority="1" scope="col">Id</th>
                                                <th data-priority="1" scope="col">Compte</th>
                                                <th data-priority="2" scope="col">Fuc</th>
                                                <th data-priority="2" scope="col">Clau</th>
                                                <th data-priority="2" scope="col">Ultima mod</th>
                                                <th data-priority="1" class="no-sort" scope="col">Estat</th>
                                                <th data-priority="2" class="no-sort" scope="col">Accio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($comptes as $compte)
                                                <tr>
                                                    <th scope="row">{{$compte->id}}</th>
                                                    <td>{{$compte->compte}}</td>
                                                    <td>{{$compte->fuc}}</td>
                                                    <td>{{$compte->clau}}</td>
                                                    <td>{{$compte->updated_at->diffForHumans()}}</td>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" @if($compte->estat == true)checked @endif class="custom-control-input" name="{{ $compte->id }}" id="estatCategories{{ $compte->id }}">
                                                            <label class="custom-control-label" for="estatCategories{{ $compte->id }}"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button id="editData{{ $compte->id }}" class="btn" data-toggle="modal" data-target="#modalData{{ $compte->id }}"><i class="fas fa-edit text-success"></i></button>
                                                        <button id="delData{{ $compte->id }}" class="btn" data-toggle="modal" data-target="#modalDel{{ $compte->id }}"><i class="fas fa-trash text-danger"></i></button>
                                                    </td>
                                                    {{-- Modal Editar Campo --}}
                                                    <div class="modal fade" id="modalData{{ $compte->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="modalDataLabel">Editar {{ $compte->compte }}</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                              </button>
                                                            </div>
                                                            {{-- Form modal --}}
                                                            <form action="/dashboard/comptes/edit/{{ $compte->id }}" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <label for="compteEdit">Compte</label>
                                                                            <input type="text" class="form-control" name="compteEdit" id="compte" placeholder="Nom del compte" value="{{ $compte->compte }}" required>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label for="fucEdit">Fuc</label>
                                                                            <input type="number" class="form-control" name="fucEdit" id="fuc" placeholder="fuc" value="{{ $compte->fuc }}" required>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label for="clauEdit">Clau</label>
                                                                            <input type="text" class="form-control" name="clauEdit" id="clau" placeholder="clau" value="{{ $compte->clau }}" required>
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
                                                    <div class="modal fade" id="modalDel{{ $compte->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalDelLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="modalDelLabel">Eliminar {{ $compte->compte }}</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                              </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Estas segur que vols eliminar el compte {{ $compte->compte }}?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                <a id="delcompte" href="/dashboard/comptes/delete/{{$compte->id}}" class="btn btn-success">Eliminar</a>
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
                                    <form action="/dashboard/comptes/add" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="compte">Compte</label>
                                                <input type="text" class="form-control" name="compte" id="compte" placeholder="Nom del compte" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="fuc">Fuc</label>
                                                <input type="number" class="form-control" name="fuc" id="fuc" placeholder="fuc" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="clau">Clau</label>
                                                <input type="text" class="form-control" name="clau" id="clau" placeholder="clau" required>
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