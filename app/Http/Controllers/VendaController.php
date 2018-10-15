<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\FormaDePagamento;
use App\Models\Produto;
use App\Models\Situacao;
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
        $vendas = Venda::with('cliente')->with('produto')->with('formaDePagamento')->with('situacao')->get();
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
        $situacoes = Situacao::all();
        return view('vendas.form')
            ->with('clientes', $clientes)
            ->with('produtos', $produtos)
            ->with('formasDePagamento', $formasDePagamento)
            ->with('situacoes', $situacoes)
            ->with('venda', new Venda());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $venda = null)
    {
        if ( $venda == null )
            $venda = new Venda();

        $venda->cliente_id = $request->get('cliente');
        $venda->produto_id = $request->get('produto');
        $venda->quantidade = $request->get('quantidade');
        $venda->valor = $request->get('valor');
        $venda->formaDePagamento_id = $request->get('formaDePagamento');
        $venda->vencimento = $request->get('vencimento');

        $dataVencimento = explode("/", $venda->vencimento);
        $dataBancoDeDados = $dataVencimento[2] . "-" . $dataVencimento[1] . "-" . $dataVencimento[0];
        $venda->vencimento = $dataBancoDeDados;

        $venda->situacao_id = $request->get('situacao');
        $venda->save();

    }

    public function relatorios(Request $request)
    {
        $vendas = new Venda();

        if ( $request->get('di') ) {

            $dataInicialDoBancoDeDados = explode( "/", $request->get('di'));
            $dataInicialDoBancoDeDados = $dataInicialDoBancoDeDados[2] . "-" . $dataInicialDoBancoDeDados[1] . "-" . $dataInicialDoBancoDeDados[0];

            $vendas = $vendas->where('vencimento', '>=', $dataInicialDoBancoDeDados);
        }

        if ( $request->get('df') ){

            $dataFinalDoBancoDeDados = explode( "/", $request->get('df'));
            $dataFinalDoBancoDeDados = $dataFinalDoBancoDeDados[2] . "-" . $dataFinalDoBancoDeDados[1] . "-" . $dataFinalDoBancoDeDados[0];

            $vendas = $vendas->where('vencimento', '<=', $dataFinalDoBancoDeDados);
        }

        $dataAtual = date("y-m-d");

        if ( $request->get('situacoes') ) {
            $vendas = $vendas->whereIn('situacao_id', $request->get('situacoes') );
        }

        if ( $request->get('aberta') ){
            $vendas = $vendas->where('vencimento', '>=', $dataAtual);
        }

        if ( $request->get('vencida') ){
            $vendas = $vendas->where('vencimento', '<', $dataAtual);
        }

        $vendas = $vendas->get();

        return view('vendas.index')->with('vendas', $vendas);
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
        return $this->create()->with('venda',  Venda::findOrFail($id) )->with('isUpdate', true);
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
        $venda = Venda::findOrFail($id);
        return $this->store($request, $venda);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venda = Venda::findOrFail($id);
        $venda->delete();
    }

    public function relatoriosForm() {
        $situacoes = Situacao::all();
        return view('vendas/relatorios')->with('situacoes', $situacoes);
    }
}
