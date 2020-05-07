<?php
//app/Helpers/Envato/User.php
namespace App\Http\Helpers;
 
use Illuminate\Support\Facades\DB;
use App\UserSocialShare;

class SocialSharesHelpers {


public static function socialshares($user_id, $key){
	return UserSocialShare::where('user_id', $user_id)
		->where('socialsite', $key)
		->first();
}

	
}