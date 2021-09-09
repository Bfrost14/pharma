<?php

namespace App\Http\Controllers;

use App\Models\Stocks;
use App\Models\Medicaments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = DB::table('stocks')
            ->join('medicaments', 'stocks.medicaments_id', '=', 'medicaments.id')
            ->join('categories', 'medicaments.categories_id', '=', 'categories.id')
            ->where("stocks.quantite","!=",0)
            ->orderBy("stocks.ajout", "ASC")
            ->get();

            return view("stocks.index", compact("stocks"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stocks = DB::table('stocks')
        ->join('medicaments', 'stocks.medicaments_id', '=', 'medicaments.id')
        ->join('categories', 'medicaments.categories_id', '=', 'categories.id')
        ->where("stocks.quantite","!=",0)
        ->orderBy("stocks.ajout", "ASC")
        ->get();

        $medicaments = Medicaments::all();
        return view("stocks.create", compact("medicaments","stocks"));
    }

    public function print(){
        $stocks = DB::table('stocks')
            ->join('medicaments', 'stocks.medicaments_id', '=', 'medicaments.id')
            ->join('categories', 'medicaments.categories_id', '=', 'categories.id')
            ->where("stocks.quantite","!=",0)
            ->orderBy("stocks.ajout", "ASC")
            ->get();
        return view('stocks.prints', compact("stocks"));
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
            'quantite' => 'required',
            'expiration' => 'required',
            'manufactured' => 'required',
            'purchased' => 'required',
            'medicaments_id' => 'required',
        ]);

        Stocks::create($request->all());

        return redirect()->route("stocks.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stocks  $stocks
     * @return \Illuminate\Http\Response
     */
    public function show(Stocks $stocks)
    {
        $stocks= Stocks::find($stocks->id);
        return view('stocks.show',['stocks'=> $stocks]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stocks  $stocks
     * @return \Illuminate\Http\Response
     */
    public function edit(Stocks $stocks)
    {
        return view('stocks.edit',compact('stocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stocks  $stocks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stocks $stocks)
    {
        $request->validate([
            "quantite" => "required",
        ]);

        $stocks::where('id', $stocks->id)->update($request->find());

        return redirect()->route('stocks.index')->with('success', 'stocks editer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stocks  $stocks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stocks $stocks)
    {
        Stocks::find($stocks->id)->delete();

        return response()->json(['success'=>'Stocks Spprimé.']);;
    }
}
