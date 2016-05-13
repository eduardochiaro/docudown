<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;

class IndexController extends Controller
{
    //
    public function index(){

      $path = base_path();

      $categories = Category::all();

      return view('sections.index', ['categories' => $categories]);
    }
}
