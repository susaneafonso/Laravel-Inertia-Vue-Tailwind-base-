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

class ProductController extends Controller
{

    public function store (Request $request){


    //    id_origem_carnes: selectOrigin.value,
    //   nome_carnes: name_meat,
    //   preco_kg_carnes:price_meat,

        $request->validate([
            'id_origem_carnes'=>'required',
            'nome_carnes'=>'required',
            'preco_kg_carnes'=>'required',
        ]);
         // required|string|lowercase|email|max:255|unique:'.User::class

            $searchProd = DB::table('tipos_carnes')->where('nome_carnes', $request->nome_carnes)
            ->where('id_origem_carnes', $request->id_origem_carnes)
            ->first();

            if($searchProd){

                  return redirect()->route('prod-regist.index')->with('message','produto existe');
            }


            $product = tiposCarnes::create(

                [

                'id_origem_carnes'=> $request->id_origem_carnes,

                'nome_carnes'=> strtolower($request->nome_carnes) ,

                'preco_kg_carnes'=> $request->preco_kg_carnes,

                ]);

            return redirect()->route('prod-regist.index')->with('message','produto registrado');


    }



    public function index(){

            $meatGroup = DB::table('grupos_carnes')->pluck('grupo_carnes','id_grupo_carnes',);

            $meatOrigin = DB::table('origem_carnes')->select('id_grupo_carnes','id_origem_carnes','nome_origem_carnes',)->get();

            return Inertia::render('products/ProductRegistration',[
                'meatGroup' =>  $meatGroup,
                'meatOrigin' => $meatOrigin,
                'message'=> session('message')
            ]);

    }

     public function create(Request $request){


            $request->validate([
                'id_origem_carnes'=>'required',
                'nome_carnes'=>'required',
                'preco_kg_carnes'=>'required',
             ]);
            $meatGroup = DB::table('grupos_carnes')->pluck('grupo_carnes','id_grupo_carnes',);

            $meatOrigin = DB::table('origem_carnes')->select('id_grupo_carnes','id_origem_carnes','nome_origem_carnes')->get();

                return Inertia::render('products/ProductRegistration',
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


}
