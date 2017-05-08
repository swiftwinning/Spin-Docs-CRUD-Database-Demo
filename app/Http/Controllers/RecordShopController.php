<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecordShopController extends Controller
{
    /*
    *  GET
    *  /
    */  
    public function main() {
        return view('main');
    }
    
    /*
    *  GET
    *  /shops/
    */  
    public function allShops() {
        return view('allShops');
    }
    
    /*
    *  GET
    *  /shops/{id}
    */  
    public function profile($id) {
        return view('profile')->with([
            'id' => $id,
        ]);
    }
}
