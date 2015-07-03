<?php

namespace App\Http\Controllers;
;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Controller for operations with smartphone 
 * 
 * @author Aleksandr Mokrenko <alex.mokrencko@yadex.ru>
 */
class SmartphoneController extends Controller
{
	/**
	 * Method to show property of smartphone via ioc
	 *
	 * @return view 
	 */
    public function getShowProperties(){
	    $smartphone = app()->make('AnotherCustomSmartphone');
	    return view('smartphone.show', ['smartphone' =>(string) $smartphone]);
    }
}
