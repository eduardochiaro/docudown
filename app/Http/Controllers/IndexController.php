<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Parsedown;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class IndexController extends Controller
{
    //
    public function index(){

      $parse = new Parsedown();

      echo 'hello';

      echo $parse->text('Hello _Parsedown_!');

      $path = base_path();

      $ite=new RecursiveDirectoryIterator($path."/documents/");

      foreach (new RecursiveIteratorIterator($ite) as $filename=>$cur) {

          echo "$filename\n";
      }

    }
}
