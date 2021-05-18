@extends('admin.Layout.dashboard')
@section('content')
<section class="categories">
    <div class="container pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Pagaments
                            <a class="btn btn-danger float-right ml-2" href="/dashboard/pagaments/exportPdf"><i class="fas fa-file-pdf"></i></a>
                            <a class="btn btn-success float-right" href="/dashboard/pagaments/exportExel"><i class="fas fa-file-excel"></i></a>
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
                                <div class="tab-pane fade show active table-responsive" id="table" role="tabpanel" aria-labelledby="table-tab">
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Categoria</th>
                                                <th scope="col">Compte</th>
                                                <th scope="col">Curs</th>
                                                <th scope="col">Any</th>
                                                <th scope="col">Pagament</th>
                                                <th scope="col">Descripció</th>
                                                <th scope="col">Preu</th>
                                                <th scope="col">Data_fi</th>
                                                <th scope="col">Ultima mod</th>
                                                <th data-priority="1" class="no-sort" scope="col">Estat</th>
                                                <th data-priority="2" class="no-sort" scope="col">Accio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pagaments as $pagament)
                                                <tr>
                                                    <th scope="row" id="ampliar">{{$pagament->id}}</th>
                                                    <td>{{$pagament->categoria_id}}</td>
                                                    <td>{{$pagament->compte_id}}</td>
                                                    <td>{{$pagament->curs}}</td>
                                                    <td>{{$pagament->curs_id}}</td>
                                                    <td>{{$pagament->pagament}}</td>
                                                    <td id="camposL">{!! $pagament->descripcio !!}</td>
                                                    <td>{{$pagament->preu}}</td>
                                                    <td>{{$pagament->data_fi}}</td>
                                                    <td>{{$pagament->updated_at->diffForHumans()}}</td>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" @if($pagament->estat == true)checked @endif class="custom-control-input" name="{{ $pagament->id }}" id="estatCategories{{ $pagament->id }}">
                                                            <label class="custom-control-label" for="estatCategories{{ $pagament->id }}"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button id="editData{{ $pagament->id }}" class="btn" data-toggle="modal" data-target="#modalData{{ $pagament->id }}"><i class="fas fa-edit text-success"></i></button>
                                                        <button id="delData{{ $pagament->id }}" class="btn" data-toggle="modal" data-target="#modalDel{{ $pagament->id }}"><i class="fas fa-trash text-danger"></i></button>
                                                    </td>
                                                    {{-- Modal Editar Campo --}}
                                                    <div class="modal fade" id="modalData{{ $pagament->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="modalDataLabel">Editar {{ $pagament->pagament }}</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                              </button>
                                                            </div>
                                                            {{-- Form modal --}}
                                                            <form action="/dashboard/pagaments/edit/{{ $pagament->id }}" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label for="Categoria">Categoria</label>
                                                                            <select class="form-control"  name="categoriaEdit" id="CategoriaEdit" placeholder="Categoria">
                                                                                @foreach ($categories as $categoria)
                                                                                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                                                                                @endforeach
                                                                            </select>
                            
                                                                            <label for="compte">Compte</label>
                                                                            <select class="form-control" name="compteEdit" id="compteEdit" placeholder="Compte">
                                                                                @foreach ($comptes as $compte)
                                                                                <option value="{{$compte->id}}">{{$compte->compte}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="preu">Preu</label>
                                                                            <input type="number" class="form-control" id="preuEdit" name="preuEdit" placeholder="preu en €" value="{{$pagament->preu}}" required>
                            
                                                                            <label for="data_fi">Data final</label>
                                                                            <input type="date" class="form-control" id="data_fiEdit" name="data_fiEdit" placeholder="Ultim dia per a pagar" value="{{$pagament->data_fi}}" required>
                                                                            
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="curs">Curs</label>
                                                                            <input type="text" class="form-control" id="cursEdit" name="cursEdit" placeholder="Curs" value="{{$pagament->curs}}" required>
                                                                            
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                        <label for="curs_id">Curs (anual)</label>
                                                                            <select class="form-control" name="curs_idEdit" id="curs_idEdit" placeholder="curs (anual)">
                                                                                @foreach ($cursos as $curs)
                                                                                <option value="{{$curs->id}}">{{$curs->curs}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label for="pagament">Pagament</label>
                                                                            <input type="text" class="form-control" id="pagamentEdit" name="pagamentEdit" placeholder="Concepte del pagament" value="{{$pagament->pagament}}" required>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label for="descripcio">Descripció</label>
                                                                            <textarea  class="ckeditor" name="descripcioEdit" id="descripcioEdit" placeholder="afegeix una descripcio">
                                                                                {{$pagament->descripcio}}
                                                                            </textarea>
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
                                                    <div class="modal fade" id="modalDel{{ $pagament->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalDelLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="modalDelLabel">Eliminar {{ $pagament->pagament }}</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                              </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Estas segur que vols eliminar el pagament {{ $pagament->pagament }}?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                <a id="delpagament" href="/dashboard/pagaments/delete/{{$pagament->id}}" class="btn btn-success">Eliminar</a>
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
                                    <form action="/dashboard/pagaments/add" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="Categoria">Categoria</label>
                                                <select class="form-control"  name="categoria" id="Categoria" placeholder="Categoria">
                                                    @foreach ($categories as $categoria)
                                                    <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                                                    @endforeach
                                                </select>

                                                <label for="compte">Compte</label>
                                                <select class="form-control" name="compte" id="compte" placeholder="Compte" required>
                                                    @foreach ($comptes as $compte)
                                                    <option value="{{$compte->id}}">{{$compte->compte}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="preu">Preu</label>
                                                <input type="number" class="form-control" id="preu" name="preu" placeholder="preu en €" required>

                                                <label for="data_fi">Data final</label>
                                                <input type="date" class="form-control" id="data_fi" name="data_fi" placeholder="Ultim dia per a pagar" required>
                                                
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="curs">Curs</label>
                                                <input type="text" class="form-control" id="curs" name="curs" placeholder="Curs" required>
                                                
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="curs_id">curs (anual)</label>
                                                <select class="form-control" name="curs_id" id="curs_id" placeholder="curs (anual)">
                                                    @foreach ($cursos as $curs)
                                                    <option value="{{$curs->id}}">{{$curs->curs}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="pagament">Pagament</label>
                                                <input type="text" class="form-control" id="pagament" name="pagament" placeholder="Concepte del pagament" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label for="Estat">Estat</label>
                                                    <select class="form-control"  name="estat" id="Estat" placeholder="Estat">
                                                        <option value="1">Actiu</option>
                                                        <option value="0">Inactiu</option>
                                                    </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="descripcio">Descripció</label>
                                                <textarea  class="ckeditor" name="descripcio" id="descripcio" placeholder="afegeix una descripcio">
                                                    
                                                </textarea>
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