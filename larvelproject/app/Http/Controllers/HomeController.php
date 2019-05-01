<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\Request as Req;
use App\Animal;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Deals with the initial log in, and shows either animals up for adoption or pending requests
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		//Admin display
		if (Gate::allows('display_all')) {
			$requests = Req::select('requests.id', 'users.name', 'animals.animal_name', 'status')
			->join('animals', 'animals.id', '=', 'requests.animalid')
			->join('users', 'users.id', '=', 'requests.userid')
			->where('requests.status', 'pending')
			->get();
			//$accountsQuery=$accountsQuery->where('userid', auth()->user()->id);
			return view('requests/handle_pending_requests', array('requests'=>$requests));
		}
		
		
		
		
		//return view('/display', array('requests'=>$requests));
		//User display
		$animals = Animal::select('id', 'animal_name', 'date_of_birth', 'description', 'image')
	->where('availability', 'available')
	->get();
		
		return view('user_home', array('animals' => $animals));
	}

    
}

