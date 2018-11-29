<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
    //
    protected $table = 'records';

    protected $fillable = [
    	'id','id_alumno', 'Fecha', 'Status', 
    ];

    protected $hidden = [
    	'id','id_alumno', 'Fecha', 'Status',  
    ];

    public function miembro()
    {
        return $this->belongsTo('App\Miembro','id_alumno');
    }

}
