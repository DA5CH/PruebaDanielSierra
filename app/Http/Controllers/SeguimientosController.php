<?php

namespace App\Http\Controllers;

use App\Models\seguimientos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;

class SeguimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['seguimientos'] = seguimientos::all();
        return view('seguimientos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('seguimientos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosSeguimientos = request()->except('_token');
        
        $fechaInicial = $datosSeguimientos['fecha']; // Fecha inicial en formato 'Y-m-d'
        $dias = $datosSeguimientos['dias']; 
        $fechaObjeto = new DateTime($fechaInicial);
            
        for ($i = 1; $i <= $dias; $i++) {
            $fechaObjeto->add(new DateInterval('P1D'));

            // Verificar si el día es sábado (6) o domingo (0)
            // Si es fin de semana, sumar un día adicional
            if ($fechaObjeto->format('N') == 6) {
                $fechaObjeto->add(new DateInterval('P2D'));
            }
            if ($fechaObjeto->format('N') > 6) {
                $fechaObjeto->add(new DateInterval('P1D'));
            }
        } 
        $datosSeguimientos['fecha_proximo_seguimiento'] = $fechaObjeto->format('Y-m-d');
        seguimientos::insert($datosSeguimientos);
        return redirect('seguimientos')->with('mensaje','seguimiento creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\seguimientos  $seguimientos
     * @return \Illuminate\Http\Response
     */
    public function show(seguimientos $seguimientos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\seguimientos  $seguimientos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $seguimiento = seguimientos::findOrFail($id);
        return view('seguimientos.edit',compact('seguimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\seguimientos  $seguimientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        $datosSeguimientos = request()->except(['_token','_method']);
        
        $fechaInicial = $datosSeguimientos['fecha']; // Fecha inicial en formato 'Y-m-d'
        $dias = $datosSeguimientos['dias']; 
        $fechaObjeto = new DateTime($fechaInicial);
            
        for ($i = 1; $i <= $dias; $i++) {
            $fechaObjeto->add(new DateInterval('P1D'));

            // Verificar si el día es sábado (6) o domingo (0)
            // Si es fin de semana, sumar un día adicional
            if ($fechaObjeto->format('N') == 6) {
                $fechaObjeto->add(new DateInterval('P2D'));
            }
            if ($fechaObjeto->format('N') > 6) {
                $fechaObjeto->add(new DateInterval('P1D'));
            }
        } 
        $datosSeguimientos['fecha_proximo_seguimiento'] = $fechaObjeto->format('Y-m-d');
        seguimientos::where('id','=',$id)->update($datosSeguimientos);
        return redirect('seguimientos')->with('mensaje','seguimiento modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\seguimientos  $seguimientos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        seguimientos::destroy($id);
        return redirect('seguimientos');
    }
}
