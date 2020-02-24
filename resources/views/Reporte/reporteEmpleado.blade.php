<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de empleados</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <H1>REPORTE DE EMPLEADOS</H1><br>
                <H3>Feacha: {{$now->format('d/m/Y')}}</H3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Cédula</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Departamento asociado</th>
                        </tr> 
                    </thead>
                    <tbody>
                        
                        @foreach ($empleado  as $item)
                            <tr>
                                <td>{{$item->cedula}}</td>
                                <td>{{$item->nombre}}</td>
                                <td>{{$item->apellido}}</td>
                                <td>
                                    @php
                                    $id=$item->departamento_id;
                                      $dep=DB::table('departamentos')->where('id',$id)->get();
                                      foreach ($dep as $d ) {
                                          $r=$d->name;
                                      }  
                                    @endphp
                                    {{$r}}
                                </td>
                            </tr> 
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</body>
</html>