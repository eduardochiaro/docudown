<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\Category;
use App\File;

class JsonController extends Controller
{
    public function scanFolder($folder){

      $path = realpath(base_path().DIRECTORY_SEPARATOR.$folder);
      $tree = array();
      $success = false;
      $tree = $this->dirToArray($path);
      if(!empty($tree)){
        DB::table('categories')->truncate();
        DB::table('files')->truncate();
        $success = $this->saveScan($tree);
      }

      return response()->json(['success'=>$success]);
    }

    private function dirToArray($dir) {

       $result = array();

       $cdir = scandir($dir);
       foreach ($cdir as $key => $value)
       {
          if (!in_array($value,array(".","..")))
          {
             if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
             {
                $result[$value] = $this->dirToArray($dir . DIRECTORY_SEPARATOR . $value);
             }
             else
             {
                $result[] = $value;
             }
          }
       }

       return $result;
    }

    private function saveScan($tree, $level = 0){
      foreach($tree as $key => $sub){
        //var_dump($key);
        if(!is_numeric($key)){

          $name= ucfirst(str_replace('_', '', $key));

          $class = new Category();
          $class->parent_id = $level;
          $class->name = $name;
          $class->reference = $key;

          $class->save();
          $this->saveScan($sub, $class->id);

        }else{
          $reference= ucfirst(str_replace('.md', '', $sub));

          $class = new File();
          $class->filename = $sub;
          $class->reference = $reference;
          $class->category_id = $level;
          $class->save();
        }
      }
      return true;
    }
}
