<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class SaleCreate extends Controller
{
    //
      public function index(){

            $meatOrigin = DB::table('origem_carnes')->pluck('grupo_carnes','id_grupo_carnes',);
            $meatType = DB::table('')->select('id_grupo_carnes','id_origem_carnes','nome_origem_carnes',)->get();
            $meatName = DB::table('')->select('id_grupo_carnes','id_origem_carnes','nome_origem_carnes',)->get();
            $meatSeason= DB::table('')->select('id_grupo_carnes','id_origem_carnes','nome_origem_carnes',)->get();
            $meatHollyday= DB::table('')->select('id_grupo_carnes','id_origem_carnes','nome_origem_carnes',)->get();
            $meatCompet= DB::table('')->select('id_grupo_carnes','id_origem_carnes','nome_origem_carnes',)->get();

            return Inertia::render('products/ProductRegistration',[
                'meatGroup' =>  $meatGroup,
                'meatOrigin' => $meatOrigin,
                'message'=> session('message')
            ]);

    }
}
