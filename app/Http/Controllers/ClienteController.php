<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\persona;

use DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   
        $clientes = persona::all();
        return view('formularios.clientes', compact("clientes"));
    }

    public function listarClientes()
    {
     $clientes =persona::all();
     return view('tablas.tablaCliente',compact("clientes"));
    }

    public function search_cliente($cedula){
        $clientes =DB::select("select id, cedula, nombres, correo, apellidos, direccion, telefono
                        FROM personas p where p.cedula='$cedula'");
       if($clientes==[]){
                    return response()->json(array('sql_vacio'=>'vacio'));
             }else{
                 foreach ($clientes as $client) {
                 return response()->json(array(
                    'id'        =>$client->id,
                    'cedula'    =>$client->cedula,
                    'nombres'   =>$client->nombres,
                    'correo'    =>$client->correo,
                    'apellidos' =>$client->apellidos,
                    'direccion' =>$client->direccion,
                    'telefono'  =>$client->telefono));

            }
        }
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
       persona::create(['cedula' =>$request->input('txt_cedula'),
                     'nombres' =>$request->input('txt_nombre'),
                     'correo'=>$request->input('txt_correo'),
                     'apellidos'=>$request->input('txt_apellido'),
                     'direccion'=>$request->input('txt_direccion'),
                     'telefono'=>$request->input('txt_telefono'),
                            ]);
        return response()->json(["registro"=>true]);
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
