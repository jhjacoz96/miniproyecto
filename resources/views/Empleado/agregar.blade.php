@extends('layout')
@section('seccion')
<div >
    @include('flash::message')
</div>
    <div class="row mt-3">
        <div class="col-md-4">
                <form action="/empleado" method="post">
                    @csrf
                    <input type="text" name="cedula" placeholder="Cédula" class="form-control mb-2" 
                    value="{{old('cedula')}}">
                    {!!$errors->first('cedula','<small>:message</small><br>')!!}
                    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" 
                    value="{{old('nombre')}}">
                    {!!$errors->first('nombre','<small>:message</small><br>')!!}
                    <input type="text" name="apellido" placeholder="Apellido" class="form-control mb-2" 
                    value="{{old('apellido')}}">
                    {!!$errors->first('apellido','<small>:message</small><br>')!!}
                    <select name="departamento_id" id="departamento_id" class="form-control">
                        <option value="">Seleccion una opción</option>
                        @foreach($departamento as $item)
                        
                        <option value="{{$item->id}}">
                            {{$item->name}}
                        </option>
                        @endforeach
                    </select>
                    {!!$errors->first('departamento_id','<small>:message</small><br>')!!}
                    <a href="{{route('empleado.index')}}" class="btn btn-secondary btn-outline-secondary">Volver</a>
                    <button class="btn btn-info mt-2" type="submit">Agregar</button>
                </form>
        </div>
    </div>
    
@endsection