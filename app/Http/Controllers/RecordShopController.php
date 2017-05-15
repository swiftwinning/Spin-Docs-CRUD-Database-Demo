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
        $states = RecordShopController::getStates();
        return view('newShop')->with([
            'states' => $states,
        ]);
    }
    
    /*
    *  POST
    *  /shops/new
    */  
    public function saveNewProfile(Request $request) {
    
        #  Validate fields of form
        #  Name and city may contain letters, spaces, and the characters .'-
        #  Address may contain letters, numbers, spaces, and the characters .'-
        $this->validate($request, [
            'name' => "required|regex:/^[A-Za-z .'-]+$/u",
            'address' => "required|regex:/^[A-Za-z0-9 .#'-]+$/u",
            'city' => "required|regex:/^[A-Za-z .'-]+$/u",
            'state' => 'required|min:2',
            'zip' => 'required|numeric|digits:5',
            'phone' => 'required|numeric|digits:10',
            'web_link' => 'required|url',
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
        if($tags){
			foreach($tags as $tagName) {
				$tag = Tag::where('name','LIKE',$tagName)->first();
				# Connect this tag to the shop
				$shop->tags()->save($tag);
			}
        }
        
        Session::flash('message', 'The profile '.$request->name.' has been saved.');
        
        return redirect('/shops');    
    }
    
    /*
    *  GET
    *  /shops/edit/{id}
    */  
    public function editProfile($id) {
        $states = RecordShopController::getStates();
        $shop = Shop::find($id);
        $tagIndexes = [];
        foreach($shop->tags as $tag) {
            $tagIndexes[] = $tag->id;
        }
        return view('editShop')->with([
            'shop' => $shop,
            'states' => $states,
            'tagIndexes' => $tagIndexes,
        ]);
    }
  
    /*
    *  POST
    *  /shops/edit
    */  
    public function saveProfileEdit(Request $request) {
        #  Validate fields of form
        #  Name and city may contain letters, spaces, and the characters .'-
        #  Address may contain letters, numbers, spaces, and the characters .'-
        $this->validate($request, [
            'name' => "required|regex:/^[A-Za-z .'-]+$/u",
            'address' => "required|regex:/^[A-Za-z0-9 .#'-]+$/u",
            'city' => "required|regex:/^[A-Za-z .'-]+$/u",
            'state' => 'required|min:2',
            'zip' => 'required|numeric|digits:5',
            'phone' => 'required|numeric|digits:10',
            'web_link' => 'required|url',
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
        
        $tags = ($request->tags) ?: [];
        $shop->tags()->sync($tags);
        $shop->save();
        
        Session::flash('message', 'The profile '.$request->name.' has been saved.');
        
        return redirect('/shops/'.$shop->id);
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
    *  /reviews/edit
    */  
    public function saveNewReview(Request $request) {
   
        #  Validate fields of form
        $this->validate($request, [
            'stars' => 'required',
            'text' => 'required|min:2',
        ]);
            
        $review = new Review();
        
        $review->stars = $request->stars;
        $review->text = $request->text;
        $review->shop_id = $request->shop_id;
        $review->save();
        
        Session::flash('message', 'Your review of '.Shop::find($request->shop_id)->name.' has been saved.');
        
        return redirect('/shops/'.$request->shop_id);   
    }
    
    /*
    *  GET
    *  /delete/{id}
    */  
    public function deleteConfirm($id) {
        $shop = Shop::find($id);    
        return view('delete')->with([
            'shop' => $shop,
        ]);
    }
    
    /*
    *  POST
    *  /delete
    */  
    public function deleteProfile(Request $request) {
        
        $shop = Shop::find($request->id);
        #  Remove links to tags and reviews before deleting
        $shop->tags()->detach();
        $reviews = Review::where('shop_id', '=', $request->id)->get();
        foreach($reviews as $review){
            $review->delete();
        }
        #  Flash message to session to get name before it is deleted
        Session::flash('message', Shop::find($request->id)->name.' has been deleted.');
        
        $shop->delete();
    
        return redirect('/shops/');   
    }
    
    static function getStates(){
        return ['-', 'AK', 'AL', 'AR', 'AZ', 'CA', 'CO', 'CT', 'DE', 'FL', 'GA', 'HI', 
                'IA', 'ID', 'IL', 'IN', 'KS', 'KY', 'LA', 'MA', 'MD', 'ME', 'MI', 'MN', 
                'MO', 'MS', 'MT', 'NC', 'ND', 'NE', 'NH', 'NJ', 'NM', 'NV', 'NY', 'OH', 
                'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VA', 'VT', 'WA', 
                'WI', 'WV', 'WY'];
    }
}


