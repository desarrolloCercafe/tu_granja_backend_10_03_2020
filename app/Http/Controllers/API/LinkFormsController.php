<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\LinkForm;

class LinkFormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = LinkForm::all();
        return response()->json($links, 200);
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
        $form = DB::table('link_forms')
            ->where('link_forms.macro_id', $request[0])
            ->select('link_forms.*')
            ->get();
        return response()->json($form, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $forms = LinkForm::where('area_id', $id)->get();
        return response()->json($forms, 200);
    }

    public function AnswersByType($type){

        //return response()->json($type, 200);

        $tipo = 0;

        $infoForm = [];

        switch ($type) {
            case 'Formato Peso Ensaque':
                $infoForm['results'] = DB::select(
                    'SELECT id, FechaPesoEnsaque as fecha, OP as op, 
                        TemperaturaPromedio as temp_promedio, 
                        Densidad as densidad, "calidad/pesoEnsaque/:id" as accion FROM peso_ensaque', []
                );
                break;
            case 'Formato Control de Macros y Micros':
                $infoForm['results'] = DB::select(
                    'SELECT * FROM macros_micros', []
                );
                break;
            case 'Formato Reporte Diario Calidad':
                //$tipo = 3;
                $infoForm['results'] = DB::select(
                    'SELECT rp.id, rp.fecha, 
                        (CONCAT(SUBSTRING(rp.fecha,3,2), SUBSTRING(rp.fecha,6,2), SUBSTRING(rp.fecha,9,2), "-", rp.turno, "-", op.consecutivo, "-", c.ref_concentrado, "-", op.consecutivo_dieta)) as lote, 
                        op.consecutivo as op, rp.num_bache, u.nombre_completo as analista, "/cercafe-forms/calidad/reporteDiario/edit" as accion
                    FROM reporte_calidad rp 
                    INNER JOIN orden_produccion op ON op.id = rp.op 
                    INNER JOIN concentrados c ON c.id = op.id_dieta
                    INNER JOIN users u ON u.id = rp.analista', []);
                break;
            case 'Formato de Registro Ordenes de Producción':
                $infoForm['results'] = DB::select(
                    'SELECT op.id, op.consecutivo, op.cantidad_baches as cant_baches, 
                        c.nombre_concentrado as dieta, "/cercafe-forms/calidad/registroOp/edit" as accion
                        FROM orden_produccion op INNER JOIN concentrados c ON c.id = op.id_dieta', []
                );
                break;
            case 'Formato de recepción de Materias Primas':
                $tipo = 5;
                break;
            default:
                $tipo = 6;
                break;
        }

        $infoForm['type'] = $type;

        return response()->json($infoForm, 200);

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
