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

      $categories = $this->getCategories();

      return view('sections.index', ['categories' => $categories]);
    }
    public function getCategories(){
      return Category::orderby('name', 'asc')->get();
    }
}
