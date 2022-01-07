<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','destino','descripcion','costo_1','costo_2','costo_3','costo_4','dificultad','incluye','img_1','img_2','estado'];

}
