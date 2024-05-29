<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // show all listings

    public function index()
    {
        return  view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
            // latest()->get():: will get all latest data from the data base starting from the newest
            /*
            this will get all the listing from the database
            'listings' => Listing::all()
            */
        ]);
    }

    // Show a single listing
    public function show(Listing $listing)
    {

        //  implicit route model binding 

        return view(
            'listings.show  ',
            [
                'listing' => $listing
            ]
        );

        /*
    How to check if a wildcard exist 
     how to manually do implicit route model route binding.
    $listing = Listing::find($id);
    if ($listing) {
        return view('listing', [
            'listing' => $listing
        ]);
    } else {
        abort('404');
    }
    */
    }

    public function create()
    {
        return view('listings.create');
    }

    // store listing data in the data base
    public function store(Request $request)
    /*
     to put data in the database, you have to put it inside a fillable 
     To be able to do this you go to the modal and declare a fillable variable
     and pass all the values you will be sending to the back to the database
     */
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // $formFields['user_id'] = auth()->id();


        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing created successfully');
    }

    // Show Edit Form
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update listing
    public function update(Request $request, Listing $listing)
    /*
     to put data in the database, you have to put it inside a fillable 
     To be able to do this you go to the modal and declare a fillable variable
     and pass all the values you will be sending to the back to the database
     */
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required',],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);
        return back()->with('message', 'Listing update successfully');
    }

    // Delete Listing 
    public function delete(Listing $listing)
    {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }
}
