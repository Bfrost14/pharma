<?php

namespace App\Http\Controllers;

use App\Models\Ventes;
use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventes = Ventes::whereDate("date_vente","=",date("Y-m-d"))->get();

        return view("ventes.index", compact("ventes"));
    }

    public function print(){
        $ventes = Ventes::whereDate("date_vente","=",date("Y-m-d"))->get();
        return view('ventes.print-ventes',compact("ventes"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ventes.create", compact("vente"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = DB::table('carts')
        ->join('medicaments', 'carts.medicaments_id', '=', 'medicaments.id')
        ->join('stocks', 'carts.stock_id', '=', 'stocks.id')
        ->join('categories', 'categories.id', '=', 'medicaments.categories_id')
        ->get();

        $request->validate([
            'code' => 'required',
            'nom' => 'required',
            'marque' => 'required',
            'taux' => 'required',
            'type' => 'required',
            'quantite' => 'required',
            'price' => 'required',
        ]);
        Ventes::create($request->all());


        return redirect()->route("home");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ventes  $ventes
     * @return \Illuminate\Http\Response
     */
    public function show(Ventes $ventes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ventes  $ventes
     * @return \Illuminate\Http\Response
     */
    public function edit(Ventes $ventes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ventes  $ventes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ventes $ventes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ventes  $ventes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ventes $ventes)
    {
        //
    }
}
