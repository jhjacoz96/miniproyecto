@extends('layout')

@section('seccion')

<div class="container">
    @include('flash::message')
</div>
    <h1>Gestionar departamentos</h1><br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Código</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Acción</th>ñ
                        </tr> 
                    </thead>
                    <tbody>
                        @foreach ($departamento as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->codDep}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <a href="{{route('departamento.edit',$item)}}" class="btn btn-warning btn-sm">Editar</a>

                                    <form action="{{route('departamento.destroy',$item)}}" method="POST" class="d-inline" >
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">Eliminar</button>
                                      </form>

                                </td>
                            </tr> 
                        @endforeach
                    </tbody>
                  </table>
                  {{$departamento->links()}}
                <a href="{{route('departamento.create')}}" class="btn btn-success">Agregar Departamento</a>
            </div>   
        </div>
    </div>
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
      </script>
@endsection