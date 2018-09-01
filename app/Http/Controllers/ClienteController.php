<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
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
        return view('clientes.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            $empresa->store($request, $cliente);
        }

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
