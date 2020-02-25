@extends('layout')

@section('seccion')

<div class="container">
    @include('flash::message')
</div>
    <h3 class="mt-3">Gestionar departamentos</h3><br>
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
                                    <a href="{{route('departamento.edit',$item)}}" class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i></a>

                                    <form action="{{route('departamento.destroy',$item)}}" method="POST" class="d-inline" >
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Esta seguro que desea eliminar este departamento?')"><i class="fas fa-trash-alt"></i></button>
                                      </form>

                                </td>
                            </tr> 
                        @endforeach
                    </tbody>
                  </table>
                  {{$departamento->links()}}
                  <div class="float-right">
                      <a href="{{route('imprimir')}}" class="btn btn-outline-info">Generar reporte</a>
                      <a href="{{route('departamento.create')}}" class="btn btn-info"><i class="fa fa-user-plus"></i>Agregar Departamento</a>
                  </div>
            </div>   
        </div>
@endsection