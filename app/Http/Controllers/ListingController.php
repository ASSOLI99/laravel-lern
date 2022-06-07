<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class ListingController extends Controller
{
    //show all listings
    public function index(){
        return view('listings.index',[
            'listings'=>Listing::latest()->filter(request(['tag','search']))->get()
        ]);
    }
    //show one listing
    public function show($id){
        $listing=Listing::find($id);
        if($listing){
            return view('listings.show',[
                'listing'=>$listing
            ]);
        }else{
            abort('404',);
        }
    }
    //show create form
    public function create(){
        return view('listings.create');
    }
    //store listing data 
    public function store(Request $request){
        $formFields=$request->validate([
            'title'=>'required',
            'company'=>['required', Rule::unique('table_listings','company')],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required', 'email'],
            'tags'=>'required',
            'description'=>'required'
        ]);
        return redirect('/');
    }
}
