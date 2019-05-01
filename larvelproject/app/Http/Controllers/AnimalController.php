<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;


class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
	
	//TODO: See if still needed
	public function list(){
		return view('animals.list', array('animals'=>Animal::all()));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		//TODO only show if user is admin role
        return view ('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		// form validation TODO validate animal things
		$animal = $this->validate(request(), [
			'name' => 'required'
		]);
		//Handles the uploading of the image
		if ($request->hasFile('image')){
			//Gets the filename with the extension
			$fileNameWithExt = $request->file('image')->getClientOriginalName();
			//just gets the filename
			$filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
			//Just gets the extension
			$extension = $request->file('image')->getClientOriginalExtension();
			//Gets the filename to store
			$fileNameToStore = $filename.'_'.time().'.'.$extension;
			//Uploads the image
			$path = $request->file('image')->storeAs('public/images', $fileNameToStore);
		} else {
			$fileNameToStore = 'noimage.jpg';
		}
		// create a Animal object and set its values from the input
		$animal = new Animal;
		//TODO sort out fields
		$animal->name = $request->input('name');
		$animal->description = $request->input('description');
		$animal->date_of_birth = $request->input('date_of_birth');
		$animal->created_at = now();
		$animal->image = $fileNameToStore;
		// save the Animal object
		$animal->save();
		// generate a redirect HTTP response with a success message
		return back()->with('success', 'Animal has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
		$animal = Animal::find($id);
		//IMPORTANT: Can pass in a bunch of info via controllers, perhaps what thing to extend in the view?
		$animal_something = "hello there";
		return view('show', array('animal' => $animal, 'animal_something' => $animal_something));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
