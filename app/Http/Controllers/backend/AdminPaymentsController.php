<?php

namespace App\Http\Controllers\backend;

use App\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPaymentsController extends Controller
{

	function __construct()
	{
        $this->middleware('admin');
	}

	public function index()
	{
		$entries = Payment::orderBy('id', 'desc')->paginate(10);

		return view('backend.payments.index')
		->withEntries($entries);
	}

	public function sortedSuccessfullPayment(Request $request)
	{
		if(!$request -> get('query')){
			$entries = Payment::orderBy('id', 'desc')->paginate(10);

			return view('backend.payments.index')
			->withEntries($entries);
		}
		else{
			$entries = Payment::where('paid','=','1')->orderBy('id', 'desc')->paginate(10);

			return view('backend.payments.index')
				->withEntries($entries);	
		}
		
	}


}