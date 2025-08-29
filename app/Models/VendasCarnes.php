<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendasCarnes extends Model
{

    protected $table= "vendas_carnes";
    public $timestamps = false;
    protected $primaryKey = "id_vendas_carnes" ;
    protected $fillable = [

            'id_tipos_carnes' ,
            'id_estacoes',
            'id_comemoracoes' ,
            'id_campeonatos_esportivos',
            'quantidade_kg',
            'valor_total',
            'venda_descricao',
            'data_venda' ,

    ];
}
