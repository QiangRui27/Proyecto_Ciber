<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vulnerabilidad extends Model
{
    protected $table = 'vulnerabilidades';

    protected $fillable = [
        'cve_id',
        'nombre_vulnerabilidad',
        'descripcion',
        'criticidad',
        'cvssp',
    ];
}
