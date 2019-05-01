<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as Req;
use App\Animal;

class RequestController extends Controller
{
	
	/**
	 * Approve a request
	 */
	 public function approve($id){
		 $req = Req::find($id);
		 $req->status = 'accepted';
		 $animal = Animal::find($req->animalid);
		 $animal->id = $req->ownerid;
		 $animal->availability = 'adopted';
		 $req->save();
		 $animal->save();
		 return redirect('home')->with('success', 'Request Approved Successfully');
	 }
	 
	 /**
	 * Deny a request
	 */
	 public function deny($id){
		 $req = Req::find($id);
		 $req->status = 'denied';
		 $req->save();
		 
		 return redirect('home')->with('success', 'Request Denied Successfully');
	 }
	
    /**
     * Display a listing of the pending requests.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending_list()
    {
		$requests = Req::select('requests.id', 'users.name', 'animals.animal_name', 'status')
			->join('animals', 'animals.id', '=', 'requests.animalid')
			->join('users', 'users.id', '=', 'requests.userid')
			->get();
			//$accountsQuery=$accountsQuery->where('userid', auth()->user()->id);
			return view('home', array('requests'=>$requests));
        //
    }
	
	public function user_requests($id){
		$requests = $requests = Req::select('requests.id', 'users.name', 'animals.animal_name', 'status')
			->join('animals', 'animals.id', '=', 'requests.animalid')
			->join('users', 'users.id', '=', 'requests.userid')
			->where('users.id', $id)
			->get();
			
			return view('requests/user_requests', array('requests' => $requests));
	}
	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function build($animalid)
    {
        
		$req = new Req();
		$req->userid = \Auth::user()->id;
		$req->animalid = $animalid;
		$req->save();
		
		
		$animals = Animal::select('id', 'animal_name', 'date_of_birth', 'description', 'image')
		->where('availability', 'available')
		->get();
		
		return view('user_home', array('animals' => $animals, 'adopted' => true));
		return redirect('home')->with('success', 'Request submitted');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
