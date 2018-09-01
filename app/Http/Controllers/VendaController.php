<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\FormaDePagamento;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendas = Venda::with('cliente')->with('produto')->with('formaDePagamento')->get();
        return view('vendas.index')->with('vendas', $vendas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        $formasDePagamento = FormaDePagamento::all();
        return view('vendas.form')
            ->with('clientes', $clientes)
            ->with('produtos', $produtos)
            ->with('formasDePagamento', $formasDePagamento);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $venda = new Venda();
        $venda->cliente_id = $request->get('cliente');
        $venda->produto_id = $request->get('produto');
        $venda->quantidade = $request->get('quantidade');
        $venda->valor = $request->get('valor');
        $venda->formaDePagamento_id = $request->get('formaDePagamento');
        $venda->vencimento = $request->get('vencimento');
        $venda->save();
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
