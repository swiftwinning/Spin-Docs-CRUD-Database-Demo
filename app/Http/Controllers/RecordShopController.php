<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shop;

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
    
    /*
    *  GET
    *  /shops/new
    */  
    public function createNewProfile() {
        return view('newShop');
    }
    
    /*
    *  GET
    *  /shops/edit/{id}
    */  
    public function editProfile($id) {
        $shop = Shop::find($id);
        return view('editShop')->with([
            'shop' => $shop,
        ]);
    }
}


