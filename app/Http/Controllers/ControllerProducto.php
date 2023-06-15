<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

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
            ->select('categorias.cat_nombre', 'productos.*')
            ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
            ->where('productos.pro_estado', '<>', 'ELIMINADO')
            ->orderBy('productos.id', 'DESC')
            ->get();

        //print_r($listado);
        //return var_dump($listado);
        //die();

        $menu = 2;
        return view('productos.producto_index', compact('menu', 'listado'));
    }

    public function nuevoProducto()
    {
        $categorias = DB::table('categorias')
            ->where('categorias.cat_estado', '=', 'ACTIVO')
            ->get();

        //print_r($listado);
        //return var_dump($listado);
        //die();

        $menu = 2;
        return view('productos.producto_nuevo', compact('menu', 'categorias'));
    }

    public function nuevoRegistroProducto(Request $request)
    {
        try {
            $obj = new Producto();
            $obj->pro_nombre = mb_strtoupper($request->post('nombre'));
            $obj->pro_descripcion = mb_strtoupper($request->post('descripcion'));
            $obj->pro_stock = $request->post('stock');
            $obj->pro_item = $request->post('item');
            $obj->pro_fecha_reg = date('Y-m-d');
            $obj->pro_estado = 'ACTIVO';
            $obj->categoria_id = $request->post('categoria_id');

            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $nombreimagen = Str::slug(date('ymdHs')) . "." . $imagen->guessExtension();
                $ruta = public_path('imagen_producto/');
                $imagen->move($ruta, $nombreimagen);
                $obj->pro_imagen = $nombreimagen;
            }
            $obj->save();
        } catch (Exception $ex) {
            var_dump($ex);
        }
    }

    public function eliminarProducto(Request $request)
    {
        $id = $request->post('id');
        $obj = Producto::find($id);
        $obj->pro_estado = 'ELIMINADO';
        $obj->save();
    }

    public function editarProducto($id)
    {
        $obj = DB::table('productos')->where('productos.id', '=', $id)->first();
        $categorias = DB::table('categorias')->where('categorias.cat_estado', '=', 'ACTIVO')->get();

        $menu = 2;
        return view('productos.producto_editar', compact('menu', 'categorias', 'obj'));
    }

    public function editarRegistroProducto(Request $request)
    {
        $id = $request->post('id');
        $pro_imagen = $request->post('pro_imagen');


        $obj = Producto::find($id);
        $obj->pro_nombre = mb_strtoupper($request->post('nombre'));
        $obj->pro_descripcion = mb_strtoupper($request->post('descripcion'));
        $obj->pro_stock = $request->post('stock');
        $obj->pro_item = $request->post('item');
        $obj->categoria_id = $request->post('categoria_id');

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::slug(date('ymdHs')) . "." . $imagen->guessExtension();
            $ruta = public_path('imagen_producto/');
            $imagen->move($ruta, $nombreImagen);
        } else {
            $nombreImagen = $pro_imagen;
        }
        $obj->pro_imagen = $nombreImagen;
        $obj->save();
    }
}
