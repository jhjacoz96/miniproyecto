@extends('layout')
@section('seccion')
<div class="row mt-3">
    <div class="col-md-4">
        <form action="{{route('departamento.update',$departamento->id)}}" method="post">
            @method('PUT')
            @csrf
            <input type="text" name="name" placeholder="Nombre" class="form-control mb-2"
            value="{{$departamento->name}}"> 
            <a href="{{route('departamento.index')}}" class="btn  btn-outline-secondary">Volver</a>
            <button class="btn btn-warning " type="submit"><i class="fas fa-user-edit"></i>Editar</button>
        </form>
    </div>
</div>
@endsection