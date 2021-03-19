<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pembayaran extends BaseController
{
	public function index()
	{
		return view('Bayar/form-bayar');
	}
}
