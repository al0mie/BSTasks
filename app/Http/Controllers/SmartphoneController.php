<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class SmartphoneController extends Controller
{
    public function getShowProperties(){
      
       return View::make('smartphone.show', $context);
    }
}
