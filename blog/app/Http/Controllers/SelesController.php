<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SelesController extends Controller
{
    public function index(){

      return view('pages.seles.index');	
    }


    
}
