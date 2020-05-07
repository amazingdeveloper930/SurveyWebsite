<?php
//app/Helpers/Envato/User.php
namespace App\Http\Helpers;
 
use Illuminate\Support\Facades\DB;
use App\Setting;

class CreditHelpers {


public static function credits($value){
	return Setting::where('key',$value)->pluck('value')->first();
}

	
}