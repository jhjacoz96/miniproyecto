<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','HomeController@index')->name('inicio');
/*
Route::get('/empleado', function(){
    return view('empleadolista');
})->name('empleado');
Route::get('/departamento', function(){
    return view('departamentoLista');
})->name('departamento');
*/

Route::resource('/empleado', 'EmpleadoController');
Route::resource('/departamento', 'DepartamentoController');
Route::name('imprimir')->get('/imprimir-pdf','Controller@imprimir');
Route::get('/reporte',function(){
    return view('Reporte/reporteEmpleado');
});