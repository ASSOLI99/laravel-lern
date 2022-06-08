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
            'listings'=>Listing::latest()->filter(request(['tag','search']))->paginate(4)
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
    //update listing data 
    public function update(Request $request, Listing $id){
        $formFields=$request->validate([
            'title'=>'required',
            'company'=>'required',
            'location'=>'required',
            'website'=>'required',
            'email'=>['required', 'email'],
            'tags'=>'required',
            'description'=>'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo']=$request->file('logo')->store('logos', 'public');
        }

        $id->update($formFields);
        return back()->with('message','Listing Updated successfully');
    }
    //show edit form
    public function edit(Listing $id){
        return view('listings.edit',['listing'=>$id]);
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

        if($request->hasFile('logo')){
            $formFields['logo']=$request->file('logo')->store('logos', 'public');
        }
        $formFields['user_id']=auth()->id();

        Listing::create($formFields);
        return redirect('/')->with('message','Listing created successfully');
    }
    //delete listing
    public function destroy(Listing $id){
        $id->delete();
        return redirect('/')->with('message','Listing deleted successfully');
    }
}