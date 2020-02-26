@extends('layout')
@section('seccion')
<div >
    @include('flash::message')
</div>
    <div class="row mt-3">
        <div class="col-md-4">
                <form action="/empleado" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" id="cedula_emp" name="cedula" placeholder="Cédula" maxlength="8" onkeypress="return soloNumeros(event)" class="form-control mb-2" 
                        value="{{old('cedula')}}">
                        {!!$errors->first('cedula','<small>:message</small><br>')!!}

                    </div>
                    <div class="form-group">
                        <input type="text" id="nombre_emp" name="nombre" maxlength="35" placeholder="Nombre" onkeypress="return soloLetras(event)" class="form-control mb-2" 
                        value="{{old('nombre')}}">
                        {!!$errors->first('nombre','<small>:message</small><br>')!!}
                    </div>
                    <div class="form-group">
                        <input type="text" id="apellido_emp" name="apellido" maxlength="35" placeholder="Apellido" onkeypress="return soloLetras(event)" class="form-control mb-2" 
                        value="{{old('apellido')}}">
                        {!!$errors->first('apellido','<small>:message</small><br>')!!}
                    </div>
                    <div class="form-group">
                        <select name="departamento_id" id="departamento_id" class="form-control">
                            <option value="">Seleccion una opción</option>
                            @foreach($departamento as $item)
                            
                            <option value="{{$item->id}}">
                                {{$item->name}}
                            </option>
                            @endforeach
                        </select>
                        {!!$errors->first('departamento_id','<small>:message</small><br>')!!}
                    </div>
                    <div class=" float-right">
                        <a href="{{route('empleado.index')}}" class="btn  btn-outline-secondary mt-2">Volver</a>
                        <button class="btn btn-info mt-2" type="submit"><i class="fa fa-user-plus"></i>Agregar</button>
                    </div>
                </form>
        </div>
    </div>
    
@endsection