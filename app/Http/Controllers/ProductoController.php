<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function mostrar()
    {
        return view('websql');
    }

    public function consultar()
    {
        $productos = DB::table('productos')->select('id', 'descripcion', 'precio', 'cantidad', 'review')->get();

        return response()->json($productos);
    }

    public function subir(Request $request)
    {
        $id = $request->input('id');
        $descripcion = $request->input('descripcion');
        $precio = $request->input('precio');
        $cantidad = $request->input('cantidad');
        $review = $request->input('review');
        
        // Elimina el registro existente
        DB::delete('DELETE FROM productos WHERE id = ?', [$id]);

        // Inserta un nuevo registro en su lugar
        DB::insert('INSERT INTO productos (id, descripcion, precio, cantidad, review) VALUES (?, ?, ?, ?, ?)', [$id, $descripcion, $precio, $cantidad, $review]);
        
        return response()->json(['message' => $id], 200);
    }
}