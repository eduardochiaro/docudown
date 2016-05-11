<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\File;

class FilesController extends Controller
{
    public function showSingle($reference){

      $file = File::where('reference', $reference)->first();

      $file->prepareData();

      echo $file->generateTree();
      echo $file->generateHTML();
    }
}
