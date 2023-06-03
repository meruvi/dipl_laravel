<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ControllerProducto extends Controller
{
    public function index()
    {
        $menu = 1;
        return view('inicio.inicio_index', compact('menu'));
    }

    public function adminProductos()
    {
        $listado = DB::table('productos')
        ->select('categorias.cat_nombre','productos.*')
        ->join('categorias','productos.categoria_id','=','categorias.id')
        ->where('productos.pro_estado','<>','ELIMINADO')
        ->orderBy('productos.id','DESC')
        ->get();

        //print_r($listado);
        //return var_dump($listado);
        //die();

        $menu = 2;
        return view('productos.producto_index', compact('menu','listado'));
    }
}
