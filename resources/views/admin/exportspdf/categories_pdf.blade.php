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
                    <th data-priority="1" scope="col">Categoria</th>
                    <th data-priority="2" scope="col">Ultima mod</th>
                    <th data-priority="1" scope="col">Estat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $data)
                    <tr>
                        <th scope="row">{{$data->id}}</th>
                        <td>{{$data->categoria}}</td>
                        <td>{{$data->updated_at->diffForHumans()}}</td>
                        <td>{{$data->estat}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>