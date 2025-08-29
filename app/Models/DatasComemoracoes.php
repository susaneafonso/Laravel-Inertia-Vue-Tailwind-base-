<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatasComemoracoes extends Model
{
    protected $table = 'datas_comemoracoes';

    public $timestamps = false;
    protected $primaryKey = "id_comemoracoes" ;
    protected $fillable = ['comemoracoes_descricao'];
}
