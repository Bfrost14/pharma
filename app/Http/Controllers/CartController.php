<?php

namespace App\Http\Controllers;


use App\Models\Carts;
use App\Models\Medicaments;
use App\Models\Stocks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = DB::table('carts')
        ->join('medicaments', 'carts.medicaments_id', '=', 'medicaments.id')
        ->join('stocks', 'carts.stock_id', '=', 'stocks.id')
        ->join('categories', 'categories.id', '=', 'medicaments.categories_id')
        ->get();
        return view("home",compact("cart"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicaments = Medicaments::all();
        $stocks = DB::table('stocks')
        ->join('medicaments', 'stocks.medicaments_id', '=', 'medicaments.id')
        ->join('categories', 'medicaments.categories_id', '=', 'categories.id')
        ->where("stocks.quantite","!=",0)
        ->orderBy("stocks.ajout", "ASC")
        ->get();

        return view("carts.create", compact("medicaments","stocks"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'medicaments_id' => 'required',
            'quantite_Carts' => 'required',
            'stock_id' => 'required',
        ]);

        Carts::create($request->all());

        return redirect()->route('home');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Carts $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Carts $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carts $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carts $cart)
    {
        Carts::find($cart->id)->delete();

        return response()->json(['success'=>'Panier deleted successfully.']);
    }
}
