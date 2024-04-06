<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //


    public function menu(){
        return view ('wp-admin.menue');
    }
    
    public function menuf(){
        return view ('wp-admin.menuef');
    }
}
