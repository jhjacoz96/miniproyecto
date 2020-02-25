@extends('layout')
@section('seccion')

<div >
    @include('flash::message')
</div>
    <h3 class="mt-3">Gestionar empleados</h3><br>
    <div class="row">
        <div class="col-md-6">
           <div class="table-responsive">
            <table class="table table-bordered table-striped" id="emp_id">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cédula</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                       <th scope="col">Departamento asociado</th>
                       <th scope="col">Fecha</th> 
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
                           {{$item->created_at->format('d/m/Y')}} 
                        </td>
                        <td>
                           <a href="{{route('empleado.edit',$item)}}" class="btn btn-warning btn-sm " ><i class="fas fa-user-edit"></i></a>

                            <form action="{{route('empleado.destroy',$item)}}" method="POST"  >
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm d-inline float-left" onclick="return confirm('¿Esta seguro que desea eliminar este empleado?')"><i class="fas fa-trash-alt"></i></button>
                              </form>
                              
                        </td>
                        
                        
                    </tr> 
                    @if (count($empleadoasc)<1)
                            <h1>No hay empleados disponibles</h1>
                        @endif
                    @endforeach
                       
                </tbody>
              </table>
           </div>
            
              <div class="float-right">
                  <a href="{{route('imprimir')}}" class="btn btn-outline-info my-2">Generar reporte</a>
                <a href="{{route('empleado.create')}}" class="btn btn-info my-2">
                    <i class="fa fa-user-plus"></i>
                    Agregar Empleado</a>
              </div>
        </div>   
    </div>
    
@endsection
