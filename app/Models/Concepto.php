<?php

// app/Models/Concepto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    protected $table = 'conceptos';
    protected $fillable = ['termino', 'definicion'];
}
