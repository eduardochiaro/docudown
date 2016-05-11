<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\File;
use App\Category;

class FilesController extends Controller
{
    public function showSingle($reference){

      $file = File::where('reference', $reference)->first();

      $file->prepareData();

      $tree = $file->generateTree();
      $html = $file->generateHTML();


      $categories = Category::all();

      return view('sections.page', ['tree' => $tree,'html' => $html, 'categories'=> $categories]);
    }
}
