<?php

namespace App\Http\Controllers;

use App\Miembro;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Records;
use App\Http\Requests\MiembroRequest;
use Excel;
use Carbon\Carbon;
use DB;

class MiembroController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only'=>['index','alumnosImport','create','edit','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $query=trim($request->get('key'));
        $miembro =DB::table('miembros')
        ->where('Matricula','LIKE',$query.'%')
        ->orwhere('Nombre','LIKE','%'.$query.'%')
        ->orwhere('Primer_Apellido','LIKE',$query.'%')
        ->orwhere('Segundo_Apellido','LIKE',$query.'%')->paginate(5);
        return view('Admin.alumnoslist',["miembro"=>$miembro , 'key'=>$query]);
    }

    public function record(Request  $request)
    {   
        $query=trim($request->get('key'));
        if (Auth::user()->Rol == 'ADMINISTRADOR') {
            $miembro =DB::table('miembros')
            ->where('Matricula','LIKE',$query.'%')
            ->orwhere('Nombre','LIKE','%'.$query.'%')
            ->orwhere('Primer_Apellido','LIKE',$query.'%')
            ->orwhere('Segundo_Apellido','LIKE',$query.'%')->paginate(5);
        }else{
            $miembro =DB::table('miembros')
            ->where('U_Admin', Auth::user()->Plantel)
            ->where(function($todo) use ($query){
                    $todo->where('Matricula','LIKE',$query.'%')
                    ->orwhere('Nombre','LIKE','%'.$query.'%')
                    ->orwhere('Primer_Apellido','LIKE',$query.'%')
                    ->orwhere('Segundo_Apellido','LIKE',$query.'%');})->paginate(5);
        }
        
        return view('Servicios.registros',["miembro"=>$miembro, 'key'=>$query]);
    }

    public function alumnosImport(Request $request)
    
    {
        if($request->hasFile('alumnos')){
            $path = $request->file('alumnos')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
                $cadena='';
                foreach ($data as $key => $value) {
                   //dd($value);//Son los nombres de las columnas
                   //Los nombres de las columnas en el archivo excel se hacen en minusvculas si estas estan en mayusculas y el espacion es un _ ej. Nombre Camp = nombre_camp
                    //$valor=substr($value->nombre,1);
                    //dd($valor);
                    $SI_NO= Miembro::where('Email_Institucional' , $value->email_institucional)
                                -> orwhere('Matricula', $value->matricula)->get();
                    if ($SI_NO->first()){
                        $cadena=$cadena.' *[ '.$value->nombre.' '.$value->primer_apellido.' '.$value->segundo_apellido.' con Marticula: '.$value->matricula.' ]* '.', ';
                    }else{
                        $info_list[] = ['Matricula' => $value->matricula,'Nombre' => $value->nombre, 'Primer_Apellido' => $value->primer_apellido, 'Segundo_Apellido' => $value->segundo_apellido, 'CURP' => $value->curp, 'Sexo' => $value->sexo, 'U_Admin' => $value->u_admin, 'U_Admin_Cve' => $value->u_admin_cve, 'Porm_Gral' => $value->prom_gral, 'Semestre' => $value->semestre_aprobado, 'Email_Institucional' => $value->email_institucional, 'Fecha_Nacimiento' => $value->fecha_nacimiento, 'Edad' => $value->edad, 'Estado_Civil' => $value->estado_civil, 'Telefono' => $value->telefono, 'Tel_Celular' => $value->tel_celular, 'Calle' => $value->calle, 'Colonia' => $value->localidad, 'Municipio' => $value->municipio, 'Estado' => $value->nac_ent_fed, 'Sit_Academica' => $value->sit_academica];                        
                        $num = count($info_list);
                        $cont = 1;
                        if ($num>1){
                           for ($i = 0; $i < $num-1; $i++){                                
                                if ($info_list[$num-1]==$info_list[$i]) {
                                    //dd($info_list[$num-1]['Matricula'].'=='.$info_list[$i]['Matricula'].' i: ',$i.' num: '.$num);
                                    $cont+= 1;
                                }
                            }
                            if ($cont>1) {
                                array_splice($info_list, $num-1,1);
                            } 
                        } 
                    }                    
                }
               //return view('Admin.infolist',["info"=>$info_list]);
                if(!empty($info_list)){
                    Miembro::insert($info_list);
                    if ($cadena=='') {
                        \Session::flash('success','<<-------------- ¡SE SUBIO EL ARCHIVO CON EXITO!--------------->>');
                    }else{
                        $mensaje='<<---------------- ¡ SE SUBIO EL ARCHIVO CON ALGUNOS ERRORES !. --------------->> '.' << " Los Alumnos " >> '.$cadena.'  <<----- ¡YA FUERON REGISTRADOS EN LA BASE DE DATOS! ----->> ';
                        \Session::flash('warnning',$mensaje);
                    }   
               }else{
                    $mensaje='<<-------------- ¡NO SE PUDO SUBIR EL ARCHIVO AL LA BASE DE DATOS!. -------------->>'.' << "Los Alumnos" >> '.$cadena.'  <<----- ¡YA FUERON REGISTRADOS EN LA BASE DE DATOS! ----->> ';
                    \Session::flash('danger',$mensaje);
               }
            }
        }else{
            \Session::flash('danger','<<-------------- ¡ NO SE SELECCIONO NINGUN ARCHIVO VUELVA A INENTARLO !. -------------->>');
        }
        return Redirect::back();
    } 

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


    public function create()
    {
        $miembro= new Miembro;
        return view('Admin.create',["miembro"=>$miembro]);
    }

    
    public function tag(Request  $request, $UID)
    {
        $busca=Miembro::where('UID', $UID)->get();
        $tag=trim($request->get('Tag'));
        if(!$busca->first()){
            if($tag){
                $query=trim($request->get('key'));
                /**Aqui hacemos una selecion con or y and con la variable
                 $todo se hace una selecion or entre tres variables y eso
                 se pone dentro de una funcion para luego usar esa selecion 
                 y aplicar una segunda selecion como un and guardando en $miembro */
                $miembro =DB::table('miembros')
                ->where('UID', NULL)
                ->where(function($todo) use ($query){
                    $todo->where('Matricula','LIKE',$query.'%')
                    ->orwhere('Nombre','LIKE','%'.$query.'%')
                    ->orwhere('Primer_Apellido','LIKE',$query.'%')
                    ->orwhere('Segundo_Apellido','LIKE',$query.'%');})->paginate(5);
            }else{
                $query=trim($request->get('key'));
                $miembro =DB::table('miembros')
                ->where('Matricula','LIKE',$query.'%')
                ->orwhere('Nombre','LIKE','%'.$query.'%')
                ->orwhere('Primer_Apellido','LIKE',$query.'%')
                ->orwhere('Segundo_Apellido','LIKE',$query.'%')
                ->paginate(5);
            }
            return view('Servicios.asignar',["miembro"=>$miembro, 'key'=>$query,'tag'=>$tag])->with("UID",$UID);
        }else{
            \Session::flash('warnning','Esta credencial ya fue REGISTRADA!.'.$UID);
            return redirect("/list/registros-alumnos");
        }        
    }


    public function tag2($UID, $id)
    {
        $miembro= Miembro::find($id);
        return view('Servicios.confirmar',["miembro"=>$miembro])->with("UID",$UID);
    }


    public function guardatag($UID, $id)
    {
        $uid=Miembro::find($id);
        $uid->UID=$UID;
        $uid->save();
        if ($uid->save()) {
            \Session::flash('success','La credencial se registro con EXITO!.'.$UID);
            return redirect("/list/registros-alumnos");
        }else{
            return view("Servicios.asignar");
        }
    }
    
    public function store(MiembroRequest $request)
    {
        $miembro= new Miembro;
        $miembro->Matricula=$request->Matricula;
        $miembro->Nombre=$request->Nombre;
        $miembro->Primer_Apellido=$request->Primer_Apellido;
        $miembro->Segundo_Apellido=$request->Segundo_Apellido;
        $miembro->CURP=$request->CURP;
        $miembro->Sexo=$request->Sexo;
        $miembro->U_Admin=$request->U_Admin;
        $miembro->U_Admin_Cve=$request->U_Admin_Cve;
        $miembro->Porm_Gral=$request->Porm_Gral;
        $miembro->Semestre=$request->Semestre;
        $miembro->Email_Institucional=$request->Email_Institucional;
        $miembro->Fecha_Nacimiento=$request->Fecha_Nacimiento;
        $miembro->Edad=$request->Edad;
        $miembro->Estado_Civil=$request->Estado_Civil;
        $miembro->Telefono=$request->Telefono;
        $miembro->Tel_Celular=$request->Tel_Celular;
        $miembro->Calle=$request->Calle;
        $miembro->Colonia=$request->Colonia;
        $miembro->Municipio=$request->Municipio;
        $miembro->Estado=$request->Estado;
        $miembro->Sit_Academica=$request->Sit_Academica; 
        #se guarda el registro
        $miembro->save();
        if ($miembro->save()) {
            return redirect("/admin7alumnoslist");
        }else{
            return view("Admin.create");
        }
    }

    public function show(Miembro $miembro)
    {
        //
    }

    
    public function edit($id)
    {
        $miembro= Miembro::find($id);
        return view('Admin.edit',["miembro"=>$miembro]);
    }

    
    public function update(MiembroRequest $request,  $miembro)
    {
        $miembro= Miembro::find($miembro);
        $miembro->Matricula=$request->Matricula;
        $miembro->Nombre=$request->Nombre;
        $miembro->Primer_Apellido=$request->Primer_Apellido;
        $miembro->Segundo_Apellido=$request->Segundo_Apellido;
        $miembro->CURP=$request->CURP;
        $miembro->Sexo=$request->Sexo;
        $miembro->U_Admin=$request->U_Admin;
        $miembro->U_Admin_Cve=$request->U_Admin_Cve;
        $miembro->Porm_Gral=$request->Porm_Gral;
        $miembro->Semestre=$request->Semestre;
        $miembro->Email_Institucional=$request->Email_Institucional;
        $miembro->Fecha_Nacimiento=$request->Fecha_Nacimiento;
        $miembro->Edad=$request->Edad;
        $miembro->Estado_Civil=$request->Estado_Civil;
        $miembro->Telefono=$request->Telefono;
        $miembro->Tel_Celular=$request->Tel_Celular;
        $miembro->Calle=$request->Calle;
        $miembro->Colonia=$request->Colonia;
        $miembro->Municipio=$request->Municipio;
        $miembro->Estado=$request->Estado;
        $miembro->Sit_Academica=$request->Sit_Academica; 
        #se guarda el registro
        $miembro->save();
        if ($miembro->save()) {
            return redirect("/admin7alumnoslist");
        }else{
            return view("Admin.edit");
        }
    }

    public function destroy($miembro)
    {
        Miembro::destroy($miembro);
        return redirect('/admin7alumnoslist');
    }
}
