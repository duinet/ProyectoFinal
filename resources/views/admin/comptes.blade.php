@extends('admin.Layout.dashboard')
@section('content')
<section class="categories">
    <div class="container pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Comptes</div>
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
                                                <th data-priority="1" scope="col">Id</th>
                                                <th data-priority="1" scope="col">Compte</th>
                                                <th data-priority="2" scope="col">Fuc</th>
                                                <th data-priority="2" scope="col">Clau</th>
                                                <th data-priority="2" scope="col">Ultima mod</th>
                                                <th data-priority="1" scope="col">Estat</th>
                                                <th data-priority="2" scope="col">####</th>
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
                                                            <input type="checkbox" @if($compte->estat == true)checked @endif class="custom-control-input" name="{{ $compte->id }}" id="estatCategories">
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