<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Miembro;
use Illuminate\Support\Facades\Redirect;
use App\Records;
use Carbon\Carbon;

class HardwareController extends Controller
{
    public function decide(Request $request, $UID)
    {
        $SI_NO= Miembro::where('UID', $UID)->get();
        #Decide si el UID esta registrado para entrada
        if ($SI_NO->first()) {
            #si se encuentra hace el registro 
            $registro=$SI_NO->first();
            $record= new Records;
            $record->id_alumno=$registro->id;
            #Obtenemos la hora actual
            $now=Carbon::now();
            $Hora=$now->format('H:i');
            $Fecha=$now->format('Y-m-d');
            $record->Fecha=$Fecha;
            $record->Hora=$Hora;
            #PARA EL STATUS
            #SI LA HORA ACTUAL ES MAYOR O IGUAL AL HORARIO DE ENTRADA Y ES MENOR A LA HORA DE SALIDA Status=ENTRADA
            if ($Hora>='07:00' AND $Hora<'14:30'){
                $record->Status='ENTRADA';
            #SI NO Status= SALIDA
            }else{
                $record->Status="SALIDA";
             }
            #se guarda el registro
            $record->save();
            #Hacer cominicacion con arduino para enviar msj-sms
            #tomamos tota la infromacion del alumno.
        }
    }
}
