@extends('admin.Layout.dashboard')
@section('content')
<section class="categories">
    <div class="container pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Categories
                            <a class="btn btn-danger float-right ml-2"><i class="fas fa-file-pdf"></i></a>
                            <a class="btn btn-success float-right"><i class="fas fa-file-excel"></i></a>
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
                                                <th scope="col">Id</th>
                                                <th data-priority="1" scope="col">Categoria</th>
                                                <th data-priority="2" scope="col">Ultima mod</th>
                                                <th data-priority="1" scope="col">Estat</th>
                                                <th data-priority="2" scope="col">Accio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $categoria)
                                                <tr>
                                                    <th scope="row">{{$categoria->id}}</th>
                                                    <td>{{$categoria->categoria}}</td>
                                                    <td>{{$categoria->updated_at->diffForHumans()}}</td>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" @if($categoria->estat == true)checked @endif class="custom-control-input" name="{{ $categoria->id }}" id="estatCategories{{ $categoria->id }}">
                                                            <label class="custom-control-label" for="estatCategories{{ $categoria->id }}"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button id="editData{{ $categoria->id }}" class="btn" data-toggle="modal" data-target="#modalData{{ $categoria->id }}"><i class="fas fa-edit text-success"></i></button>
                                                        <button id="delData{{ $categoria->id }}" class="btn" data-toggle="modal" data-target="#modalDel{{ $categoria->id }}"><i class="fas fa-trash text-danger"></i></button>
                                                    </td>
                                                    {{-- Modal Editar Campo --}}
                                                    <div class="modal fade" id="modalData{{ $categoria->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="modalDataLabel">Editar {{ $categoria->categoria }}</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                              </button>
                                                            </div>
                                                            {{-- Form modal --}}
                                                            <form action="/dashboard/categories/edit/{{ $categoria->id }}" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-8">
                                                                            <label for="CategoriaEdit">Categoria</label>
                                                                            <input type="text" class="form-control" id="CategoriaEdit" name="CategoriaEdit" placeholder="Nom de la categoria" value="{{ $categoria->categoria }}">
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
                                                    <div class="modal fade" id="modalDel{{ $categoria->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalDelLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="modalDelLabel">Eliminar {{ $categoria->categoria }}</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                              </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Estas segur que vols eliminar la categoria {{ $categoria->categoria }}?</p>
                                                                <p>En el cas de eliminar-lo, s'esborraran tots els pagaments asociats a la categoria.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                <a id="delCategoria" href="/dashboard/categories/delete/{{$categoria->id}}" class="btn btn-success">Eliminar</a>
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
                                    <form action="/dashboard/categories/add" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="Categoria">Categoria</label>
                                                <input type="text" class="form-control" id="Categoria" name="Categoria" placeholder="Nom de la categoria">
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