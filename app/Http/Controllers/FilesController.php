<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\File;

class FilesController extends Controller
{
    public function showSingle($folder, $reference){

      $file = new File();
      $file->folder = $folder;
      $file->reference = $reference;
      $file->prepareData();

      echo $file->generateTree();
      echo $file->generateHTML();
    }
}
