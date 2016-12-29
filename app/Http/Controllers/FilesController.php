<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\File;
use App\Category;

class FilesController extends Controller
{
    public function showSingle($filename){

      $file = File::where('filename', $filename)->first();

      $file->prepareData();

      $tree = $file->generateTree();
      $html = $file->generateHTML();
      $title = $file->reference;


      $categories = app('App\Http\Controllers\IndexController')->getCategories();

      $data = [
        'tree' => $tree,
        'html' => $html,
        'title' => $title,
        'categories'=> $categories
      ];

      return view('sections.page', $data);
    }
}
