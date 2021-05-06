<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    </head>
    <body>
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
                    <th data-priority="1" scope="col" >Estat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagaments as $data)
                    <tr>
                        <th scope="row" id="ampliar">{{$data->id}}</th>
                        <td>{{$data->categoria_id}}</td>
                        <td>{{$data->compte_id}}</td>
                        <td>{{$data->curs}}</td>
                        <td>{{$data->curs_id}}</td>
                        <td>{{$data->pagament}}</td>
                        <td id="camposL">{!! $data->descripcio !!}</td>
                        <td>{{$data->preu}}</td>
                        <td>{{$data->data_fi}}</td>
                        <td>{{$data->updated_at->diffForHumans()}}</td>
                        <td>{{$data->estat}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>