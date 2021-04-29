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
                                                <th scope="col">creado desde</th>
                                                <th data-priority="1" scope="col">Estat</th>
                                                <th data-priority="2" scope="col">####</th>
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
                                                            <input type="checkbox" @if($user->estat == true)checked @endif class="custom-control-input" name="{{ $user->id }}" id="estatCategories">
                                                            <label class="custom-control-label" for="estatCategories"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href=""><i class="fas fa-edit"></i></a>
                                                    </td>
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
                                            <input type="email" class="form-control" name="email" id="email" placeholder="email del usuari" required>
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