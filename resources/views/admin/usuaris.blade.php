@extends('admin.Layout.dashboard')
@section('content')
<section class="categories">
    <div class="container pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Usuaris</div>
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
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Creat el</th>
                                                <th data-priority="1" class="no-sort" scope="col">Estat</th>
                                                <th data-priority="1" class="no-sort" scope="col">Rol</th>
                                                <th data-priority="2" class="no-sort" scope="col">Accio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <th scope="row">{{$user->id}}</th>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->created_at}}</td>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" @if($user->estat == true)checked @endif class="custom-control-input" name="{{ $user->id }}" id="estatCategories{{ $user->id }}" id-checkbox="estat">
                                                            <label class="custom-control-label" for="estatCategories{{ $user->id }}"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" @if($user->rol == true)checked @endif class="custom-control-input" name="{{ $user->id }}" id="estatRol{{ $user->id }}" id-checkbox="rol">
                                                            <label class="custom-control-label" for="estatRol{{ $user->id }}"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button id="editData{{ $user->id }}" class="btn" data-toggle="modal" data-target="#modalData{{ $user->id }}"><i class="fas fa-edit text-success"></i></button>
                                                        <button id="delData{{ $user->id }}" class="btn" data-toggle="modal" data-target="#modalDel{{ $user->id }}"><i class="fas fa-trash text-danger"></i></button>
                                                    </td>
                                                    {{-- Modal Editar Campo --}}
                                                    <div class="modal fade" id="modalData{{ $user->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="modalDataLabel">Editar {{ $user->name }}</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                              </button>
                                                            </div>
                                                            {{-- Form modal --}}
                                                            <form action="/dashboard/usuaris/edit/{{ $user->id }}" method="POST">
                                                                <div class="modal-body">
                                                                    <div class="form-group col-md-6">
                                                                        <label for="name">Nom</label>
                                                                        <input type="text" class="form-control" name="nameEdit" id="nameEdit" placeholder="Nom del usuari" value="{{ $user->name }}" required>
                                                                        <label for="email">Email</label>
                                                                        <input type="email" class="form-control" name="emailEdit" id="emailEdit" placeholder="email del usuari" value="{{ $user->email }}" required>
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
                                                    <div class="modal fade" id="modalDel{{ $user->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalDelLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="modalDelLabel">Eliminar {{ $user->name }}</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                              </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Estas segur que vols eliminar l'usuari {{ $user->name }}?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                <a id="delpagament" href="/dashboard/usuaris/delete/{{$user->id}}" class="btn btn-success">Eliminar</a>
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
                                    <form action="/dashboard/usuaris/add" method="POST">
                                        <div class="form-group col-md-6">
                                            <label for="name">Nom</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Nom del usuari" required>
                                            <label for="email">Email</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="email" id="email" placeholder="email del usuari" required>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">@xtec.cat</div>
                                                </div>
                                            </div>
                                            <label for="password">Contraseña</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="contraseña" required>
                                            <label for="Estat">Estat</label>
                                            <select class="form-control"  name="estat" id="Estat" placeholder="Estat">
                                                <option value="1">Actiu</option>
                                                <option value="0">Inactiu</option>
                                            </select>
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