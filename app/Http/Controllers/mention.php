<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mention extends Controller
{
  public function contact() //simple route du footer
  {
  	return view('mention.contact');
  }   

  public function cgv()
  {
  	return view('mention.cgv');
  }

  public function mentionslegales()
  {
  	return view('mention.mentionslegales');
  }
}
