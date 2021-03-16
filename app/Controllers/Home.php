<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function info(){
		echo 'Info SPP';	
	}

	public function developer(){

		echo 'Dibuat oleh : Dadan';
	}
}
