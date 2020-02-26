@extends('layout')
@section('seccion')
<!--
@if (count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach 
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
-->
        <div class="row mt-3">
            <div class="col-md-4">
                    <form action="/departamento" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" id="nombre" maxlength="35" name="nombre" onkeypress="return soloLetras(event)" placeholder="Nombre" class="form-control" 
                            value="{{old('nombre')}}">
                            {!!$errors->first('nombre','<small>:message</small><br>')!!}
                        </div>
                        <div class="float-right">
                            <a href="{{route('departamento.index')}}" class="btn btn-outline-secondary ">Volver</a>
                            <button class="btn btn-info" type="submit"><i class="fa fa-user-plus"></i>Agregar</button>
                        </div>
                    </form>
            </div>
        </div>
    
@endsection