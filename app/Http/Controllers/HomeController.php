<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Stocks;
use App\Models\Carts;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stocks = DB::table('stocks')
            ->join('medicaments', 'stocks.medicaments_id', '=', 'medicaments.id')
            ->join('categories', 'medicaments.categories_id', '=', 'categories.id')
            ->where("stocks.quantite","!=",0)
            ->orderBy("stocks.ajout", "ASC")
            ->get();

            $carts = DB::table('carts')
            ->select('carts.id AS idd','prix','quantite_Carts','medicaments.nom','stock_id','medicaments.cod_Medoc','medicaments.marque','medicaments.dosage','description')
        ->join('medicaments', 'carts.medicaments_id', '=', 'medicaments.id')
        ->join('stocks', 'carts.stock_id', '=', 'stocks.id')
        ->join('categories', 'categories.id', '=', 'medicaments.categories_id')
        ->get();
        return view('home', compact("stocks","carts"));
    }


}
