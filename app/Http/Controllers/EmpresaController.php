<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::with('cliente')->get();
        return view('empresas.index')->with('empresas', $empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('empresas.form')->with('clientes', $clientes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Cliente $cliente = null)
    {
        $empresa = new Empresa();
        $empresa->nome = $request->get('empresa_nome');
        $empresa->razao = $request->get('empresa_razao');
        $empresa->cnpj = $request->get('empresa_cnpj');
        $empresa->ie = $request->get('empresa_ie');
        $empresa->email = $request->get('empresa_email');
        $empresa->bairro = $request->get('empresa_bairro');
        $empresa->numero = $request->get('empresa_numero');
        $empresa->complemento = $request->get('empresa_complemento');
        $empresa->cep = $request->get('empresa_cep');
        $empresa->cidade = $request->get('empresa_cidade');
        $empresa->estado = $request->get('empresa_estado');
        $empresa->telefone = $request->get('empresa_telefone');
        $empresa->cliente_id = $cliente->id;
        $empresa->save();
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
