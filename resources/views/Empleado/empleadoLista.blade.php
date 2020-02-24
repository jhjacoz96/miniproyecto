@extends('layout')
@section('seccion')

<div >
    @include('flash::message')
</div>

<h1>Gestionar empleados</h1><br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
           <a href=""  class="btn  btn-outline-info btn-sm">ascendente</a>
           <a href="" class="btn btn-outline-info btn-sm">descendente</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cédula</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Departamento asociado</th>
                        <th scope="col">Acción</th>
                    </tr> 
                </thead>
                <tbody>
                    
                    @foreach ($empleadoasc  as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
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
                            <td>
                               <a href="{{route('empleado.edit',$item)}}" class="btn btn-warning btn-sm " >Editar</a>

                                <form action="{{route('empleado.destroy',$item)}}" method="POST" class="d-inline" >
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                  </form>

                            </td>
                        </tr> 
                    @endforeach
                </tbody>
              </table>
              {{$empleadoasc ?? ''->links()}}
            <a href="{{route('empleado.create')}}" class="btn btn-success">Agregar Empleado</a>
            <a href="{{route('imprimir')}}" class="btn btn-outline-info">Generar reporte</a>
        </div>   
    </div>
</div>
@endsection
