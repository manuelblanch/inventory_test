<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;

class HomeController extends BaseController{
  public function about(){
    return view::make('about');
  }
}
