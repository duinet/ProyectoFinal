@extends('admin.Layout.dashboard')
@section('content')
<section class="categories">
    <div class="container pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Categories</div>
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
                                <div class="tab-pane fade show active table-responsive" id="table" role="tabpanel" aria-labelledby="table-tab">
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Categoria</th>
                                                <th scope="col">Compte</th>
                                                <th scope="col">Curs</th>
                                                <th scope="col">Pagament</th>
                                                <th scope="col">Descripció</th>
                                                <th scope="col">Preu</th>
                                                <th scope="col">Data_fi</th>
                                                <th scope="col">Ultima modificació</th>
                                                <th scope="col">####</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pagaments as $pagament)
                                                <tr>
                                                    <th scope="row">{{$pagament->id}}</th>
                                                    <td>{{$pagament->categoria_id}}</td>
                                                    <td>{{$pagament->compte_id}}</td>
                                                    <td>{{$pagament->curs}}</td>
                                                    <td>{{$pagament->pagament}}</td>
                                                    <td>{{$pagament->descripcio}}</td>
                                                    <td>{{$pagament->preu}}</td>
                                                    <td>{{$pagament->data_fi}}</td>
                                                    <td>{{$categoria->updated_at->diffForHumans()}}</td>
                                                    <td>
                                                        <a href=""><i class="fas fa-edit"></i></a>
                                                        <a href={{"/dashboard/pagaments/delete/".$categoria['id']}}><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- End content tabla --}}
                                {{-- Content add value --}}
                                <div class="tab-pane fade" id="afegirRegistre" role="tabpanel" aria-labelledby="afegirRegistre-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="Categoria">Categoria</label>
                                                <select class="form-control"  name="categoria" id="Categoria" placeholder="categoria">
                                                    @foreach ($categories as $categoria)
                                                    <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                                                    @endforeach
                                                </select>

                                                <label for="compte">Compte</label>
                                                <select class="form-control" name="compte" id="compte" placeholder="compte">
                                                    @foreach ($comptes as $compte)
                                                    <option value="{{$compte->id}}">{{$compte->compte}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="curs">Curs</label>
                                                <select class="form-control" name="curs" id="curs" placeholder="curs">
                                                    @foreach ($cursos as $curs)
                                                    <option value="{{$curs->id}}">{{$curs->curs}}</option>
                                                    @endforeach
                                                </select>

                                                <label for="curs">Curs</label>
                                                <select class="form-control" name="curs" id="curs" placeholder="curs">
                                                    @foreach ($cursos as $curs)
                                                    <option value="{{$curs->id}}">{{$curs->curs}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="descripcio">Descripció</label>
                                                <textarea  class="ckeditor" name="descripcio" id="descripcio" rows="10" cols="80" placeholder="">
                                                    Afegeix una descripció del pagament
                                                </textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Sign in</button>
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