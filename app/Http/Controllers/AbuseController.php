<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AbuseController extends Controller
{
    public function publicRegister(){
    	return view('abuse/submit');
    }
}
