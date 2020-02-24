@extends('layout')

@section('seccion')

<div class="container">
    @include('flash::message')
</div>
    <h3>Gestionar departamentos</h3><br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Código</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad de empleados</th>
                            <th scope="col">Acción</th>
                        </tr> 
                    </thead>
                    <tbody>
                        @foreach ($departamento as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->codDep}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{count($item->empleado)}}</td>
                                <td>
                                    <a href="{{route('departamento.edit',$item)}}" class="btn btn-warning btn-sm">Editar</a>

                                    <form action="{{route('departamento.destroy',$item)}}" method="POST" class="d-inline" >
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Esta seguro que desea eliminar este departamento?')">Eliminar</button>
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
@endsection