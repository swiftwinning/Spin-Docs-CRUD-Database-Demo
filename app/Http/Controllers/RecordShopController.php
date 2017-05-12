<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Shop;
use App\Review;
use App\Tag;

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
        $reviews = Review::where('shop_id', '=', $id)->latest()->get();
        return view('profile')->with([
            'shop' => $shop,
            'reviews' => $reviews,
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
        
        $tags = $request->tags;
        foreach($tags as $tagName) {
            $tag = Tag::where('name','LIKE',$tagName)->first();
            
            

            # Connect this tag to the shop
            $shop->tags()->save($tag);
        }
        
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
    
    /*
    *  GET
    *  /reviews/edit/{id}
    */  
    public function createNewReview($id) {
        $shop = Shop::find($id);
        
        return view('newReview')->with([
            'shop' => $shop,
        ]);
    }
    
    /*
    *  POST
    *  /shops/edit
    */  
    public function saveNewReview(Request $request) {
        
        
        
        #  Validate fields of form
        $this->validate($request, [
        ]);
        
        
        
        $review = new Review();
        
        $review->stars = $request->stars;
        $review->text = $request->text;
        $review->shop_id = $request->shop_id;
        $review->save();
        
        Session::flash('message', 'Your review of '.$request->shop_id.' has been saved.');
        
        return redirect('/shops/'.$request->shop_id);
        
    }
}


