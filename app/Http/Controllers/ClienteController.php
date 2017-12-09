<?php

namespace App\Http\Controllers;

use App\User;
use App\Relacion;
use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $empresas = \App\Empresa::all();

        $clientes = DB::table('cliente')->get();

        return view('/cliente/cliente', ['clientes' => $clientes], ['empresas' => $empresas]);
        
        
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

        $cliente = new Cliente;

        $user = new User;

        /*Nombre de la tabla->atributo = $request->NOMBRE DEL CAMPO*/

        $cliente->nombre = $request->nombre_cliente;

        $cliente->apellido_paterno = $request->apellido_paterno;

        $cliente->apellido_materno = $request->apellido_materno;

        $cliente->id_empresa = $request->empresa_cliente;

        /*$cliente->password = '$2y$10$YURo1qn4NaUcxOoTwza4ROUwjrZiDBGiNhAnbyGGtFCxv7/gtKs.G'; //ESTO ES 'asdfgh'*/

        $cliente->telefono = $request->telefono_cliente;

        $cliente->email = $request->correo_cliente;

        $cliente->tipo_cliente = $request->tipo_cliente;

        $cliente->save();


        $user->name = $request->nombre_cliente;

        $user->email = $request->correo_cliente;

        $user->password = bcrypt($request->password_cliente);

        $user->save();

        $usuario_id =$user->id;

        $rol->user_id = $usuario_id;

        $rol->role_id = 4;

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
        $task = Cliente::findOrFail($id);

        return view('cliente.datosCliente')->withTask($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Cliente::findOrFail($id);

        return view('cliente.paginaeditarcliente')->withTask($task);    
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
        $task = Cliente::findOrFail($id);

        $this->validate($request, [
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'tipo_cliente' => 'required'
            
        ]);

        $input = $request->all();

        $task->fill($input)->save();


        return redirect('cliente');
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

        return redirect('cliente');
    }
}
