<?php

namespace App\Http\Controllers;

use App\Models\FormaDePagamento;
use Illuminate\Http\Request;

class FormaDePagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formasDePagamento = FormaDePagamento::all();
        return view('formasDePagamento.index')->with('formasDePagamento', $formasDePagamento);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formasDePagamento.form')->with('formaDePagamento', new FormaDePagamento());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $formaDePagamento = null)
    {
        if ( $formaDePagamento == null )
        $formaDePagamento = new FormaDePagamento();

        $formaDePagamento->nome = $request->get('nome');
        $formaDePagamento->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormaDePagamento  $formaDePagamento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormaDePagamento  $formaDePagamento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->create()->with('formaDePagamento',  FormaDePagamento::findorFail($id) )->with('isUpdate', true);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormaDePagamento  $formaDePagamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formaDePagamento = FormaDePagamento::findOrFail($id);
        return $this->store($request, $formaDePagamento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormaDePagamento  $formaDePagamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formaDePagamento = FormaDePagamento::findOrFail($id);
        $formaDePagamento->delete();
    }
}
