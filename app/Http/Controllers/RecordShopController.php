<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

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
        $shops = Shop::orderBy('name')->get();
        return view('allShops')->with([
            'shops' => $shops,
        ]);;
    }
    
    /*
    *  GET
    *  /shops/{id}
    */  
    public function profile($id) {
        $shop = Shop::find($id);
        return view('profile')->with([
            'shop' => $shop,
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
    *  POST
    *  /shops/new
    */  
    public function saveNewProfile(Request $request) {
    
        #  Validate fields of form
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'phone' => 'required',
            'web_link' => 'required',
        ]);
        
        # Add new shop to database
        $shop = new Shop();
        $shop->name = $request->name;
        $shop->address = $request->address;
        $shop->city = $request->city;
        $shop->state = $request->state;
        $shop->zip = $request->zip;
        $shop->phone = $request->phone;
        $shop->web_link = $request->web_link;
        $shop->save();
        
        Session::flash('message', 'The profile '.$request->name.' has been saved.');
        
        return redirect('/shops');
        
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
    
    /*
    *  POST
    *  /shops/edit
    */  
    public function saveProfileEdit(Request $request) {
        #  Validate fields of form
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'phone' => 'required',
            'web_link' => 'required',
        ]);
        
        $shop = Shop::find($request->id);
        
        # Update shop table values
        $shop->name = $request->name;
        $shop->address = $request->address;
        $shop->city = $request->city;
        $shop->state = $request->state;
        $shop->zip = $request->zip;
        $shop->phone = $request->phone;
        $shop->web_link = $request->web_link;
        $shop->save();
        
        Session::flash('message', 'The profile '.$request->name.' has been saved.');
        
        return redirect('/shops/'.$request->id);
        
    }
    
    
}


