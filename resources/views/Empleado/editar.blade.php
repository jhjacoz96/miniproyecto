@extends('layout')
@section('seccion')
<div class="row mt-3">
    <div class="col-md-4">
            <form action="{{route('empleado.update',$empleado->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">

                    <input type="text" name="cedula" placeholder="Cédula" class="form-control mb-2" 
                    value="{{$empleado->cedula}}">
                    {!!$errors->first('cedula','<small>:message</small><br>')!!}
                </div>
                <div class="form-group">
                    
                    <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" 
                    value="{{$empleado->nombre}}">
                    {!!$errors->first('nombre','<small>:message</small><br>')!!}
                </div>
                <div class="form-group">

                    <input type="text" name="apellido" placeholder="Apellido" class="form-control mb-2" 
                    value="{{$empleado->apellido}}">
                    {!!$errors->first('apellido','<small>:message</small><br>')!!}
                </div>
                <div class="form-group">
                    <select name="departamento_id" id="departamento_id" class="form-control">
                            <option value="">Seleccion una opción</option>
                            @foreach($dep as $item)
                              <option value="{{$item->id}}">
                                {{$item->name}}
                            </option>
                            @endforeach
                    </select>
                    {!!$errors->first('departamento_id','<small>:message</small><br>')!!}
                </div>
                <div class="float-right">

                    <a href="{{route('empleado.index')}}" class="btn  btn-outline-secondary mt-2">Volver</a>
                    <button class="btn btn-warning mt-2" type="submit"><i class="fas fa-user-edit"></i>Actualizar empleado</button>
                </div>
            </form>
    </div>
</div>

@endsection