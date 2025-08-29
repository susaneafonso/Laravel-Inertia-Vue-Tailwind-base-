<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tiposCarnes extends Model
{

    protected $table= "tipos_carnes";
    public $timestamps = false;
    protected $primaryKey = "id_tipos_carnes" ;
    protected $fillable = [

            'id_origem_carnes',
            'nome_carnes',
            'preco_kg_carnes'
    ];
}
