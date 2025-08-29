<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatasCampeonatos extends Model
{
    protected $table = 'datas_campeonatos_esportivos';

    public $timestamps = false;
    protected $primaryKey = "id_campeonatos_esportivos" ;
    protected $fillable = ['campeonatos_esportivos_descricao', 'time_descricao'];
}
