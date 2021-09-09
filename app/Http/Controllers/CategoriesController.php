<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
class CategoriesController extends Controller
{
    public function cate(){
        $categories = Categorie::all();
        return view("categories.index", compact("categories"));
    }
}
