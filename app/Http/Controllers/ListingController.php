<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{

    
    // All Listings
    public function index(Request $request) {
        // dd(Listing::latest()->filter(request(['tag', 'search']))->paginate(2) );
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(10) 
        ]);
    }

    //Show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing,  'listings' => auth()->user()->listings()->get()
        ]);
    }

    //Show Create Form 
    public function create() {
        return view('listings.create');
    }

    // store listing data
    public function store(Request $request) {
        // dd($request->file('logo')); 
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);


        return redirect('/')->with('message', 'Listing created successfully');
    }

    //Show Create Form 
    public function edit(Listing $listing) {
            return view('listings.edit', ['listing' => $listing]);
        }

    // Update listing data
    public function update(Request $request, Listing $listing) {
        
        //Make sure loged in user is owner
        if($listing->user_id == auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'], 
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);


        return redirect('/')->with('message', 'Listing Updated successfully');
    }

    public function destroy(Listing $listing) {
        if($listing->user_id == auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $listing->delete();

        return redirect('/')->with('message', 'Listing deleted successfully');
    }
    
    //Manage Listings
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }

}
