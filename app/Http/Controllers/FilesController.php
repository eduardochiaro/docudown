<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\File;
use App\Models\Category;

use Parsedown;

class FilesController extends Controller
{
    public function showSingle($folder, $filename){

      //$file = File::where('filename', $filename)->first();

      //$file->prepareData();

      //$tree = $file->generateTree();
      //$html = $file->generateHTML();
      //$title = $file->reference;

      $path = realpath(base_path() . DIRECTORY_SEPARATOR . 'documents');
      $html = file_get_contents($path . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $filename);


      $find = ['.md', '_'];
      $replace = ['', ' '];
      $reference = ucwords(str_replace($find, $replace, $filename));

      $categories = app('App\Http\Controllers\IndexController')->getCategories();

      $Parsedown = new Parsedown();

      $data = [
        'html' => $Parsedown->text($html),
        'title' => $reference,
        'categories'=> $categories
      ];

      return view('sections.page', $data);
    }
}
