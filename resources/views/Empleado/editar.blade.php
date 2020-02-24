@extends('layout')
@section('seccion')
<div class="row mt-3">
    <div class="col-md-4">
            <form action="{{route('empleado.update',$empleado->id)}}" method="post">
                @csrf
                @method('PUT')
                <input type="text" name="cedula" placeholder="Cédula" class="form-control mb-2" 
                value="{{$empleado->cedula}}">
                <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" 
                value="{{$empleado->nombre}}">
                <input type="text" name="apellido" placeholder="Apellido" class="form-control mb-2" 
                value="{{$empleado->apellido}}">
                <select name="departamento_id" id="departamento_id" class="form-control">
                        <option value="">Seleccion una opción</option>
                        @foreach($dep as $item)
                          <option value="{{$item->id}}">
                            {{$item->name}}
                        </option>
                        @endforeach
                </select>
                <button class="btn btn-warning mt-2" type="submit">Actualizar empleado</button>
            </form>
    </div>
</div>

@endsection