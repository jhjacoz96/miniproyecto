<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Departamento;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Validator as validator;
use App\Http\Requests\DepartamentoStoreRequest;
use App\Http\Requests\DepartamentoUpdateRequest;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamento=Departamento::where('estatus','A')->paginate(4);
        return view('Departamento.departamentoLista',compact('departamento'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Departamento.agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
        $v=validator::make($request->all(),[
            'name'=>'min:4|unique:departamentos'
        ]);

        if ($v->fails()) {
            return \redirect()->back()->withInput()->withErrors($v->errors());
        }
    
        $departamento= new Departamento;
        $numero=count(Departamento::All())+1;
        $nombre=strtoupper($request->nombre) ;
        $departamento->name=$request->nombre;
        $departamento->codDep=$nombre[0] . $nombre[1]. 00 .$numero;
        $departamento->save();

        $message = "!El departamento " . $departamento->name . " se ha registrado con exito!";
        Flash($message)->success()->important();
        return redirect()->route('departamento.index');
    }  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $departamento=Departamento::findOrFail($id);
        return view('departamento.editar',compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
        $departamento=Departamento::findOrFail($id);
        $departamento->name=$request->name;
        $departamento->save();

        $message = "!El departamento " . $departamento->name . " ha sido modificado con exito!";
        flash($message)->success()->important();
        return redirect()->route('departamento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento=Departamento::find($id);
        $empleado=$departamento->empleado;
        $acum=0;
        $acum=count($empleado);
        if($acum>0){

            $message = "!El departamento " . $departamento->name . " no puede ser eliminado porque posee " . $acum . " empleados asignados!";
            
            flash($message)->warning()->important();
            return redirect()->route('departamento.index');

        }else{

        $departamento=Departamento::findOrFail($id);
        $departamento->delete();
        $message = "!El departamento " . $departamento->name .  " ha sido eliminado con exito!";
        flash($message)->success()->important();
        return redirect()->route('departamento.index');

        }
    }
}
