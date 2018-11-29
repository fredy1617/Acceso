<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Miembro extends Model
{
    protected $table = 'miembros';

    protected $fillable = [
    	'id','Matricula','Nombre', 'Primer_Apellido', 'Segundo_Apellido','CURP','Sexo','U_Admin','U_Admin_Cve','Porm_Gral','Semestre','Email_Institucional','Fecha_Nacimiento','Edad','Estado_Civil','Telefono','Tel_Celular','Calle','Colonia','Municipio','Estado','Sit_Academica',
    ];

    protected $hidden = [
    	'id','Matricula','Nombre', 'Primer_Apellido', 'Segundo_Apellido','CURP','Sexo','U_Admin','U_Admin_Cve','Porm_Gral','Semestre','Email_Institucional','Fecha_Nacimiento','Edad','Estado_Civil','Telefono','Tel_Celular','Calle','Colonia','Municipio','Estado','Sit_Academica',
    ];
    public function records()
    {
        return $this->hasMany('App\Records' ,'id_alumno');
    }

     public function scopeTag($query, $key)
    {
        
        if(trim($key) !="")
        {
            $query->where('Matricula',$key)
            ->orwhere('Nombre','LIKE',$key.'%')
            ->orwhere('Primer_Apellido','LIKE',$key.'%')
            ->orwhere('Segundo_Apellido','LIKE',$key.'%');
        }  
    }
    
}
