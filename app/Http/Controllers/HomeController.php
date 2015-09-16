<?php namespace App\Http\Controllers;

class HomeController extends Controller {

	
    //Constructor comprueba la session . Se pueden utilizar roles para controlar el acceso a diversas partes

		public function __construct()
	    {
		$this->middleware('auth');
		
	     }


	
	//Vista principal
	public function index()
	{
		return view('home');
	}

}
