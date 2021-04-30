<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class ApiDocumentsController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request){

      return \App\Models\File::paginate(1);
    }

    public function show($id){

      return \App\Models\File::findOrFail($id);
    }

}
