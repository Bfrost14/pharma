<?php

namespace App\Http\Controllers;

use App\Models\Medicaments;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicamentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicaments = DB::table("medicaments")
        ->select("medicaments.id AS idd","cod_Medoc","nom","marque","dosage","description","prix")
        ->join('categories', 'medicaments.categories_id', '=', 'categories.id')
        ->orderBy("nom", "ASC")
        ->get();

        $categories = Categorie::all();
        return view("medicaments.index", compact("categories","medicaments"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicaments = DB::table("medicaments")
        ->join('categories', 'medicaments.categories_id', '=', 'categories.id')
        ->orderBy("nom", "ASC")
        ->get();

        $categories = Categorie::all();
        return view("medicaments.create",compact("categories","medicaments"));
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
            'cod_Medoc' => 'required',
            'nom' => 'required',
            'prix' => 'required',
            'marque' => 'required',
            'dosage' => 'required',
            'categories_id' => 'required',
        ]);

        Medicaments::create($request->all());

        return redirect()->route('medicaments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Medicaments $Medicaments)
    {
        $Medicaments= Medicaments::find($Medicaments->id);
        return view('medicaments.show',['medicaments'=> $Medicaments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicaments $medicament,Categorie $categories)
    {

        $categories = Categorie::all();

        return view('medicaments.edit',compact('medicament','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Medicaments $medicament)
    {
        $request->validate([

        ]);

        $medicament::where('id', $medicament->id)->update($request->except(['_token', '_method' ]));

        return redirect()->route('medicaments.index')->with('success', 'Medicaments editer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicaments $Medicaments)
    {
    }
}
