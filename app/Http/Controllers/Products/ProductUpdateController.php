<?php

namespace App\Http\Controllers\Products;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\GruposCarnes;
use App\Models\tiposCarnes;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function Termwind\render;

//metodos convencionais
// create(), store(), index(), show(), edit(), update(), destroy()

class ProductUpdateController extends Controller{

 public function update (Request $request){

        $request->validate([
            'id_origem_carnes'=>'required',
            'nome_carnes'=>'required',
            'preco_kg_carnes'=>'required',
        ]);



            $searchProd = tiposCarnes::where('id_origem_carnes', $request->id_origem_carnes)
            ->where('nome_carnes', $request->nome_carnes)
            ->first();

            if(is_null($searchProd) ){
                  return redirect()->route('prod-edit.index')->with('message','produto não encontrado');
            }




                 $searchProd->id_origem_carnes =  $request->id_origem_carnes;
                 $searchProd->nome_carnes = strtolower($request->nome_carnes);
                 $searchProd->preco_kg_carnes = $request->preco_kg_carnes;

                 $searchProd->save();

                return redirect()->route('prod-edit.index')->with('message','produto atualizado');



    }


    public function create(Request $request){


            $request->validate([
                'id_origem_carnes'=>'required',
                'nome_carnes'=>'required',
                'preco_kg_carnes'=>'required',
             ]);
            $meatGroup = DB::table('grupos_carnes')->pluck('grupo_carnes','id_grupo_carnes',);

            $meatOrigin = DB::table('origem_carnes')->select('id_grupo_carnes','id_origem_carnes','nome_origem_carnes')->get();

                return Inertia::render('products/ProductUpdate',
                [
                'meatGroup' =>  $meatGroup,
                'meatOrigin' => $meatOrigin,
                'id_origem'=> $request->id_origem_carnes,
                'id_grupo'=> $request->id_grupo_carnes,
                'nome'=> $request->nome_carnes,
                'preco_kg'=>$request->preco_kg_carnes,
                'message'=> session('message')
                ]);




    }

        public function index(){

            $meatGroup = DB::table('grupos_carnes')->pluck('grupo_carnes','id_grupo_carnes',);

            $meatOrigin = DB::table('origem_carnes')->select('id_grupo_carnes','id_origem_carnes','nome_origem_carnes',)->get();

            return Inertia::render('products/ProductUpdate',[
                'meatGroup' =>  $meatGroup,
                'meatOrigin' => $meatOrigin,
                'message'=> session('message')
            ]);

    }


}


