<?php

namespace App\Http\Controllers\API;

use App\macros_micros;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class MacrosMicrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $MacroMicro = macros_micros::all();
        return response()->json($MacroMicro, 200);
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
        $MacroMicro = new macros_micros();
        $MacroMicro->FechaMacroMicro = $request->FechaMacroMicro;
        $MacroMicro->OP = $request->OP;
        $MacroMicro->LoteAzucar = $request->LoteAzucar;
        $MacroMicro->LoteCarbonato = $request->LoteCarbonato;
        $MacroMicro->LoteFosfato = $request->LoteFosfato;
        $MacroMicro->LoteArroz = $request->LoteArroz;
        $MacroMicro->LoteHemoglobina = $request->LoteHemoglobina;
        $MacroMicro->LoteNucleo = $request->LoteNucleo;
        $MacroMicro->LotePlasma = $request->LotePlasma;
        $MacroMicro->LoteSal = $request->LoteSal;
        $MacroMicro->LoteOtro = $request->LoteOtro;
        $MacroMicro->LoteAceite = $request->LoteAceite;
        $MacroMicro->MacroAceite = $request->MacroAceite;
        $MacroMicro->LoteGluten = $request->LoteGluten;
        $MacroMicro->MacroGluten = $request->MacroGluten;
        $MacroMicro->LotePescado = $request->LotePescado;
        $MacroMicro->MacroPescado = $request->MacroPescado;
        $MacroMicro->LoteLactosuero = $request->LoteLactosuero;
        $MacroMicro->MacroLactosuero = $request->MacroLactosuero;
        $MacroMicro->LoteMaiz = $request->LoteMaiz;
        $MacroMicro->MacroMaiz = $request->MacroMaiz;
        $MacroMicro->LoteMogolla = $request->LoteMogolla;
        $MacroMicro->MacroMogolla = $request->MacroMogolla;
        $MacroMicro->LotePalmiste = $request->LotePalmiste;
        $MacroMicro->MacroPalmiste = $request->MacroPalmiste;
        $MacroMicro->LoteSalvado = $request->LoteSalvado;
        $MacroMicro->MacroSalvado = $request->MacroSalvado;
        $MacroMicro->LoteSoya = $request->LoteSoya;
        $MacroMicro->MacroSoya = $request->MacroSoya;
        $MacroMicro->save();
        return response()->json("OK", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\macros_micros  $macros_micros
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $MacroMicro = DB::select('SELECT * FROM macros_micros WHERE id = ?', [$id]);
        return response()->json($MacroMicro[0], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\macros_micros  $macros_micros
     * @return \Illuminate\Http\Response
     */
    public function edit(macros_micros $macros_micros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\macros_micros  $macros_micros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $MacroMicro = DB::table('macros_micros')
        ->where('id', $id)
        ->update([
            'FechaMacroMicro' => $request["FechaMacroMicro"],
            'OP' => $request["OP"],
            'LoteAzucar' => $request["LoteAzucar"],
            'LoteCarbonato' => $request["LoteCarbonato"],
            'LoteFosfato' => $request["LoteFosfato"],
            'LoteArroz' => $request["LoteArroz"],
            'LoteHemoglobina' => $request["LoteHemoglobina"],
            'LoteNucleo' => $request["LoteNucleo"],
            'LotePlasma' => $request["LotePlasma"],
            'LoteSal' => $request["LoteSal"],
            'LoteOtro' => $request["LoteOtro"],
            'LoteAceite' => $request["LoteAceite"],
            'MacroAceite' => $request["MacroAceite"],
            'LoteGluten' => $request["LoteGluten"],
            'MacroGluten' => $request["MacroGluten"],
            'LotePescado' => $request["LotePescado"],
            'MacroPescado' => $request["MacroPescado"],
            'LoteLactosuero' => $request["LoteLactosuero"],
            'MacroLactosuero' => $request["MacroLactosuero"],
            'LoteMaiz' => $request["LoteMaiz"],
            'MacroMaiz' => $request["MacroMaiz"],
            'LoteMogolla' => $request["LoteMogolla"],
            'MacroMogolla' => $request["MacroMogolla"],
            'LotePalmiste' => $request["LotePalmiste"],
            'MacroPalmiste' => $request["MacroPalmiste"],
            'LoteSalvado' => $request["LoteSalvado"],
            'MacroSalvado' => $request["MacroSalvado"],
            'LoteSoya' => $request["LoteSoya"],
            'MacroSoya' => $request["MacroSoya"],
            ]);
        return response()->json("OK", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\macros_micros  $macros_micros
     * @return \Illuminate\Http\Response
     */
    public function destroy(macros_micros $macros_micros)
    {
        //
    }
}