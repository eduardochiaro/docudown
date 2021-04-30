<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use App\Http\Requests;
use App\Models\Category;
use App\Models\File;

class IndexController extends Controller
{
    //
  public function index(){

    $path = base_path();

    $categories = $this->getCategories();

    return view('sections.index', ['categories' => $categories]);
  }

  public function getCategories(){
    $folder = 'documents';
    $path = realpath(base_path().DIRECTORY_SEPARATOR . $folder);
    $tree = array();
    $success = false;

    $tree = $this->dirToArray($path, $folder);

    return $tree;
  }

  private function dirToArray($dir, $folder) {

    $result = array();

    $cdir = scandir($dir);
    foreach ($cdir as $key => $value)
    {
       if (!in_array($value,array(".","..",".DS_Store")))
       {
          if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
          {
            $result[$value] = [
              "title" => ucwords(str_replace("_", " ", $value)),
              "sub" => $this->dirToArray($dir . DIRECTORY_SEPARATOR . $value, $value)
            ];
          } else  {
            $find = ['.md', '_'];
            $replace = ['', ' '];
            $reference = ucwords(str_replace($find, $replace, $value));
            $route = route('file_page', ['folder' => $folder, 'filename' => $value]);
            $result[] = [
              "title" => $reference,
              "active" => URL::current() == $route,
              "link" => $route
            ];
          }
       }
    }

    return $result;
  }
}