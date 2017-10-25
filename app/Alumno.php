<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'tAlumno';
    protected $primaryKey = 'Rut';
    public $incrementing = false;
}