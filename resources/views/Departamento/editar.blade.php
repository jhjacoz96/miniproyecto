@extends('layout')
@section('seccion')
<div class="row mt-3">

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
@endif-->



    <div class="col-md-4">
        <form action="{{route('departamento.update',$departamento->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <input type="text" id="nombre" maxlength="35" name="name" onkeypress="return soloLetras(event)" placeholder="Nombre" class="form-control mb-2"
                value="{{$departamento->name}}"> 
                {!!$errors->first('nombre','<small>:message</small><br>')!!}
            </div>
            <div class="float-right">
                <a href="{{route('departamento.index')}}" class="btn  btn-outline-secondary">Volver</a>
                <button class="btn btn-warning " type="submit"><i class="fas fa-user-edit"></i>Actualizar</button>
            </div>
        </form>
    </div>
</div>
@endsection