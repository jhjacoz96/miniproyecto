<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Departamento;
use DB;
use Illuminate\Support\Facades\Validator ;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        /*$emp=DB::table('departamentos')->join('empleados','departamentos.id','=','empleados.departamento_id')->select('empleados.*','departamentos.name')->get();*/
       /* 
        $empleadodesc=Empleado::where('estatus','A')->orderBy('created_at','desc')->paginate(4);
        return view('Empleado.empleadoLista',compact('empleadoasc'));
*/
        $empleadoasc=Empleado::where('estatus','A')->orderBy('created_at','asc')->paginate(4);
        return view('Empleado.empleadoLista',compact('empleadoasc'));
        
    }

      
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamento=Departamento::All();

        if(count($departamento)<1){
            $message = '!No exiten departamentos disponibles!';
            flash($message)->warning()->important();
            return redirect()->route('empleado.index');
        }else{
        $departamento=Departamento::where('estatus','A')->get();
        return view('Empleado.agregar',compact('departamento'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v=Validator::make($request->all(),[
            'nombre'=>'min:2|required',
            'apellido'=>'min:2|required',
            'cedula'=>'min:7|required|unique:empleados',
            'departamento_id'=>'required'

        ]);

        if ($v->fails()) {
            return \redirect()->back()->withInput()->withErrors($v->errors());
        }
        
            $empleado= new Empleado;
            $empleado->cedula=$request->cedula;
            $empleado->nombre=$request->nombre;
            $empleado->apellido=$request->apellido;
            $empleado->departamento_id=$request->departamento_id;
            $empleado->save();
            $message = '!Empleado creado  con exito!';
            flash($message)->success()->important();
            return redirect()->route('empleado.index');

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
        $empleado=Empleado::findOrFail($id);
        /*return $empleado;*/
        $dep=Departamento::where('estatus','A')->get();
        return view('empleado.editar',compact('empleado'),compact('dep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v=Validator::make($request->all(),[
            'nombre'=>'min:2|required',
            'apellido'=>'min:2|required',
            'cedula'=>'min:7|required|unique:empleados', 
            //. $this->empleado,
            'departamento_id'=>'required'

        ]);

        if ($v->fails()) {
            return \redirect()->back()->withInput()->withErrors($v->errors());
        }

        $empleado=Empleado::findOrFail($id);
        $empleado->cedula=$request->cedula;
        $empleado->nombre=$request->nombre;
        $empleado->apellido=$request->apellido;
        $empleado->departamento_id=$request->departamento_id;
        $empleado->save();
        $message = '!Empleado modificado  con exito!';
        flash($message)->success();
        return redirect()->route('empleado.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado=Empleado::findOrFail($id);
        $empleado->delete();
        $message = '!Empleado eliminado  con exito!';
        flash($message)->success();
        return redirect()->route('empleado.index');
        
    }
}
