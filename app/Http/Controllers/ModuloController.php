<?php

namespace App\Http\Controllers;

use App\Modulo;
use App\Ocupa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = \App\Proyecto::all();;

        $modulos = Modulo::all();

        $empleados = DB::table('empleado')->get();

        return view('/modulo/modulo', compact('proyectos','modulos','empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validaciones

        $modulo = new Modulo;

        $modulo->id_proyecto = $request->id_proyecto;

        $modulo->nombre = $request->nombre_modulo;

        $modulo->progreso = $request->progreso_modulo;  
        
        $modulo->clasificacion = $request->clas_modulo;      

        $modulo->save();

        $ocupa = new Ocupa;

        $ocupa->id_empleado = $request->select_responsable;

        $ocupa->id_modulo = $modulo->id;

        $ocupa->save();

        return back();

        /*Nombre de la tabla->atributo = $request->NOMBRE DEL CAMPO*/
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
