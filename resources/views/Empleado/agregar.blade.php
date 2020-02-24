@extends('layout')
@section('seccion')
    <div class="row mt-3">
        <div class="col-md-4">
                <form action="/empleado" method="post">
                    @csrf
                    <input type="text" name="cedula" placeholder="Cédula" class="form-control mb-2" 
                    value="{{old('cedula')}}">
                    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" 
                    value="{{old('nombre')}}">
                    <input type="text" name="apellido" placeholder="Apellido" class="form-control mb-2" 
                    value="{{old('apellido')}}">
                    <select name="departamento_id" id="departamento_id" class="form-control">
                        <option value="">Seleccion una opción</option>
                        @foreach($departamento as $item)
                        
                        <option value="{{$item->id}}">
                            {{$item->name}}
                        </option>
                        @endforeach
                    </select>
                    <button class="btn btn-info mt-2" type="submit">Agregar</button>
                </form>
        </div>
    </div>
    
@endsection