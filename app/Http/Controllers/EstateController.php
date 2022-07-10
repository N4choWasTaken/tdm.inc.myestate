<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstateController extends Controller
{
    //Show all Estates
    public function index() {
        return view('landing', [
            'heading' => 'Latest Listings',
            'estates' => Estate::latest()->filter(request(['search']))->paginate(10)
        ]);
    }

    //Show single Estate
    public function show(Estate $estate) {
        return view('estates.show', [
            'recipe' => $estate
        ]);
    }

    //Show Create Form
    public function create() {
        return view('estates.create');
    }

    //Store Recipe Data
    public function store(Request $request) {
        //dd($request->file('image')); 
        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'price' => 'required',
        ]);

        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('foodImages', 'public');
        }

        $formFields['user_id'] = Auth::user()->id;

        Estate::create($formFields);

        return redirect('/')->with('message', 'Estate created successfully!');
    }

    //Show Edit Form
    public function edit(Estate $estate) {
        return view('estates.edit', ['recipe' => $estate]);
    }

    //Update Estate Data
    public function update(Request $request, Estate $estate) {
        //dd($request->file('image')); 

        // Make sur logged in user is owner
        if($estate->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'price' => 'required'
        ]);

        if($request->hasFile('image')) {
            $formFields['image'] = $request->file('image');
            $formFields['image']->store('foodImages', 'public');
        }

        $estate->update($formFields);

        return back()->with('message', 'Estate updated successfully!');
    }

    //Delete Estate
    public function destroy(Estate $estate) {
        // Make sur logged in user is owner
        if($estate->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        $estate->delete();
        return redirect('/')->with('message', 'Estate deleted successfully!');
    }

    //Manage Estates
    public function manage() {
        //dd( auth()->user()->Estates);
        return view('estates.manage', ['estates' => auth()->user()->estates()->get()]);
    }
}
