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
                        <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" 
                        value="{{old('nombre')}}">
                        {{$errors->first('name')}}<br>
                        <a href="{{route('departamento.index')}}" class="btn btn-secondary btn-outline-secondary ">Volver</a>
                        <button class="btn btn-info" type="submit">Agregar</button>
                    </form>
            </div>
        </div>
    
@endsection