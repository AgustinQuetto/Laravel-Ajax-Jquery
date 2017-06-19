<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = \App\Product::paginate();
        return view('home', compact('products'));
    }

    public function destroyProduct(Request $request, $id){ //Request detecta todos los parametros del formulario y si es una peticion ajax
        if($request->ajax()){
            $products = \App\Product::find($id);
            $products->delete();
            $products_total = \App\Product::all()->count();

            return response()->json([
                'total' => $products_total,
                'message' => $product->name . ' fue eliminado correctamente.'
                ]);
        }
    }
}
