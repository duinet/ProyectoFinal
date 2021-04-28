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
                                <div class="tab-pane fade show active" id="table" role="tabpanel" aria-labelledby="table-tab">
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Categoria</th>
                                                <th scope="col">Ultima modificació</th>
                                                <th scope="col">####</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $categoria)
                                                <tr>
                                                    <th scope="row">{{$categoria->id}}</th>
                                                    <td>{{$categoria->categoria}}</td>
                                                    <td>{{$categoria->updated_at->diffForHumans()}}</td>
                                                    <td>
                                                        <a href=""><i class="fas fa-edit"></i></a>
                                                        <a href={{"/dashboard/categories/delete/".$categoria->id}}><i class="fas fa-trash"></i></a>
                                                    </td>
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
                                            <div class="form-group col-md-12">
                                                <label for="Categoria">Categoria</label>
                                                <input type="text" class="form-control" id="Categoria" name="Categoria" placeholder="Nom de la categoria">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Sign in</button>
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