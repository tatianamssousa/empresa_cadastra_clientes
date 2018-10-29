<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ClienteEmpresa;
use App\Models\Empresa;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index')->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.form')->with('cliente', new Cliente())
            ->with('empresa', new Empresa());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $cliente = null)
    {
        \DB::beginTransaction();
        if ( $cliente == null )
        $cliente = new Cliente();

        $cliente->tipo = $request->get('tipo');
        $cliente->nome = $request->get('nome');
        $cliente->cpf = $request->get('cpf');
        $cliente->nascimento = $request->get('nascimento');
        $cliente->email = $request->get('email');
        $cliente->logradouro = $request->get('logradouro');
        $cliente->bairro = $request->get('bairro');
        $cliente->numero = $request->get('numero');
        $cliente->complemento = $request->get('complemento');
        $cliente->cep = $request->get('cep');
        $cliente->cidade = $request->get('cidade');
        $cliente->estado = $request->get('estado');
        $cliente->nacionalidade = $request->get('nacionalidade');
        $cliente->naturalidade = $request->get('naturalidade');
        $cliente->telefone = $request->get('telefone');
        $cliente->celular = $request->get('celular');
        $cliente->save();

        if ( $cliente->tipo == "pj") {
            $empresa = new EmpresaController();
            $cliente_empresa = new ClienteEmpresaController();
            $empresa = $empresa->store($request, $cliente);
            $cliente_empresa->store($request, $cliente, $empresa);


        }



        \DB::commit();

        return view('clientes.sucesso');
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
        $cliente = Cliente::findOrFail($id);
        return $cliente->empresa;
        //return $this->create()->with('cliente',  Cliente::findorFail($id) )->with('isUpdate', true);
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
        $cliente = Cliente::findOrFail($id);
        return $this->store($request, $cliente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
    }
}
