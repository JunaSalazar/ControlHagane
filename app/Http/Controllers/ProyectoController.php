<?php

namespace App\Http\Controllers;

use App\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProyectoController extends Controller
{
    /**
     * Show all of the users for the application.
     *
     * @return Response
     */
    public function index(){
        
        $clientes = DB::table('cliente')->get();

        $proyectos = DB::table('proyecto')->get();

        return view('/proyecto/proyecto', compact('proyectos','clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...

        $proyecto = new Proyecto;

        /*Nombre de la tabla->atributo = $request->NOMBRE DEL CAMPO*/

        $proyecto->id_cliente = $request->cliente_proyecto;

// ****************NOMBRE DEL PROYECTO********************
        $proyecto->nombre = $request->nombre_proyecto;
// ****************NOMBRE DEL PROYECTO********************
        $proyecto->fechainicio = $request->fechaInicio;
        $proyecto->fechafinal = $request->fechaFinal;
// ****************ESTATUS ACTUAL DEL PROYECTO********************
        $proyecto->estatus = $request->estatus;
// ****************ESTATUS ACTUAL DEL PROYECTO********************

// ****************ENTREGADO DEL PROYECTO********************

        $proyecto->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $task = Proyecto::findOrFail($id);

        return view('proyecto.datosProyecto')->withTask($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Proyecto::findOrFail($id);

        return view('proyecto.paginaeditarproyecto')->withTask($task);    
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
        $task = Proyecto::findOrFail($id);

        $this->validate($request, [
            'nombre' => 'required',
            'fechainicio' => 'required',
            'fechafinal' => 'required',
            'estatus' => 'required'
            
        ]);

        $input = $request->all();

        $task->fill($input)->save();


        return redirect('proyecto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Cliente::find($id);
        $post->delete();

        return redirect('proyecto');
    }

}