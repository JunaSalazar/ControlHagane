<?php

namespace App\Http\Controllers;

use App\User;
use App\Relacion;
use App\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $empleados = DB::table('empleado')->get();

        return view('/empleado/empleado', ['empleados' => $empleados]);
        
        
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

        $rol = new Relacion;

        $empleado = new Empleado;

        $user = new User;

        /*Nombre de la tabla->atributo = $request->NOMBRE DEL CAMPO*/

        $empleado->nombre = $request->nombre_empleado;

        $empleado->apellido_paterno = $request->apellido_paterno;

        $empleado->apellido_materno = $request->apellido_materno;

        /*$empleado->password = '$2y$10$YURo1qn4NaUcxOoTwza4ROUwjrZiDBGiNhAnbyGGtFCxv7/gtKs.G'; //ESTO ES 'asdfgh'*/

        $empleado->email = $request->correo_empleado;

        $empleado->password = bcrypt($request->password_empleado);

        $empleado->save();

        $tipo = 0;

        switch($request->tipo_empleado){
            case 'administrador': $tipo=2;
            break;

            case 'empleado': $tipo = 1;
            break;

        }

        $user->name = $request->nombre_empleado;

        $user->email = $request->correo_empleado;

        $user->password = bcrypt($request->password_empleado);

        $user->save();

        $usuario_id =$user->id;

        $rol->user_id = $usuario_id;

        $rol->role_id = $tipo;

        $rol->save();

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
        $task = Empleado::findOrFail($id);

        return view('empleado.datosEmpleado')->withTask($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Empleado::findOrFail($id);

        return view('empleado.paginaeditarempleado')->withTask($task);    
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
        $task = Empleado::findOrFail($id);

        $this->validate($request, [
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'email' => 'required',
            'password' => 'required'
            
        ]);

        $input = $request->all();

        $task->fill($input)->save();


        return redirect('empleado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Empleado::find($id);
        $post->delete();

        return redirect('empleado');
    }
}