<?php

namespace App\Http\Controllers;

use App\Records;
use Illuminate\Http\Request;
use DB;
use App\Miembro;

class RecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request  $request,$id)
    {   
        $Status=trim($request->get('Status'));
        $inicio=trim($request->get('inicio'));
        $fin=trim($request->get('fin'));
        $miembro=Miembro::find($id);
        if($inicio==''){
            if ($fin=='') {
                if ($Status=='') {
                    $records =DB::table('records')
                            ->where('id_alumno',$id)->get();
                }else{
                    $records =DB::table('records')
                            ->where('Status',$Status)
                            ->where(function($todo) use ($id){
                                $todo->where('id_alumno',$id);})->get();}
            }else{
                if ($Status=='') {
                    $records =DB::table('records')
                            ->where('Fecha',$fin)
                            ->where(function($todo) use ($id){
                                $todo->where('id_alumno',$id);})->get();
                }else{
                    $records =DB::table('records')
                            ->where('Status',$Status)
                            ->where(function($fecha) use ($fin){
                                $fecha->where('Fecha',$fin);})
                                ->where(function($todo) use ($id){
                                    $todo->where('id_alumno',$id);})->get();}
            }
        }else{
            if ($fin=='') {
                if ($Status=='') {
                    $records =DB::table('records')
                            ->where('Fecha',$inicio)
                            ->where(function($todo) use ($id){
                                $todo->where('id_alumno',$id);})->get();
                }else{
                    $records =DB::table('records')
                            ->where('Fecha',$inicio)
                            ->where(function($s) use ($Status){
                                $s->where('Status',$Status);})
                                ->where(function($todo) use ($id){
                                    $todo->where('id_alumno',$id);})->get();}
            }else{
                if ($Status=='') {
                    $records =DB::table('records')
                            ->whereBetween('Fecha',[$inicio,$fin])
                            ->where(function($todo) use ($id){
                                $todo->where('id_alumno',$id);})->get();
                }else{
                    $records =DB::table('records')
                            ->whereBetween('Fecha',[$inicio,$fin])
                            ->where(function($s) use ($Status){
                                $s->where('Status',$Status);})
                                ->where(function($todo) use ($id){
                                    $todo->where('id_alumno',$id);})->get();}
            }
        }

        /** 
            FALTA PONER LA PAGINACION Y ORDENAR POR FECHA MAS RECIENTE O ULTIMOS REGISTROS....

        $sql = "SELECT * FROM records WHERE id_alumno = $query";
        $records= DB::select($sql);*/
        return view('Servicios.recordslist',["records"=>$records, 'miembro'=>$miembro,'fin'=>$fin,'inicio'=>$inicio, 'Status'=>$Status])->with("id",$id);
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Records  $records
     * @return \Illuminate\Http\Response
     */
    public function show(Records $records)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Records  $records
     * @return \Illuminate\Http\Response
     */
    public function edit(Records $records)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Records  $records
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Records $records)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Records  $records
     * @return \Illuminate\Http\Response
     */
    public function destroy(Records $records)
    {
        //
    }
}
