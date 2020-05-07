<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserCredit;
use App\User;
use App\UserSocialShare;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SocialShare;
use Auth;
use Credits;
use DB;

class SocialShareController extends Controller
{
    //
    public function reportFacebookShare_site(){
        if (Input::has('error_code'))
        {
            $error_code = Input::get('error_code');
        }
        else
        {
            // $credits = new UserCredit;
            // $credits->user_id     = Auth::guard('web')->user()->id;
            // $credits->description = 'For Facebook Site Url Share';
            // $price = Credits::credits('facebook_share_credit');
            // $credits->credits     = $price;
            // $credits->save();
            // $user = User::find(Auth::guard('web')->user()->id);
            // $user->shared_credit_added = 4;
            // $user->save();
            /*
            $surveys = Campaign::where('active', '=', 1)
                ->where('public', '=', 1)
                ->orderBy('advertise_credits', 'desc')
                ->paginate();
            */
            $user = Auth::guard('web')->user();
            $user_socialshares = SocialShare::socialshares($user->id, 'facebook');
            if($user_socialshares)
            {
            	if($user_socialshares->paid_status == 0){
	            	$user_socialshares->updated_at = date('Y-m-d H:i:s');
	            	$user_socialshares->save();
	            }
            }
            else
            {
            	$usersocialshare = new UserSocialShare;
            	$usersocialshare->user_id = $user->id;
            	$usersocialshare->socialsite = "facebook";
            	$usersocialshare->paid_status = 0;
            	$usersocialshare->save();
            }

        }

        return redirect()->route('credits');
    }

    public function post_trustpilot(){
        // $user = User::find(Auth::guard('web')->user()->id);

        // $user->shared_credit_added = 1;
        // $user->save();
    	$user = Auth::guard('web')->user();
    	$user_socialshares = SocialShare::socialshares($user->id, 'trustpilot');
        if($user_socialshares)
        {
        	// $user_socialshares->updated_at = date('Y-m-d H:i:s');
        	// $user_socialshares->save();
        }
        else
        {
        	$usersocialshare = new UserSocialShare;
        	$usersocialshare->user_id = $user->id;
        	$usersocialshare->socialsite = "trustpilot";
        	$usersocialshare->paid_status = 0;
        	$usersocialshare->save();
        }

        return response()->json(['success'=>'Data is successfully added']);
    }

    public function post_sitejabber(){
    	$user = Auth::guard('web')->user();
        $user_socialshares = SocialShare::socialshares($user->id, 'sitejabber');
        if($user_socialshares)
        {
        	$user_socialshares->updated_at = date('Y-m-d H:i:s');
        	$user_socialshares->save();
        }
        else
        {
        	$usersocialshare = new UserSocialShare;
        	$usersocialshare->user_id = $user->id;
        	$usersocialshare->socialsite = "sitejabber";
        	$usersocialshare->paid_status = 0;
        	$usersocialshare->save();
        }
        return response()->json(['success'=>'Data is successfully added']);
    }

    public function post_alternativeto(){
    	$user = Auth::guard('web')->user();
        $user_socialshares = SocialShare::socialshares($user->id, 'alternativeto');
        if($user_socialshares)
        {
        	$user_socialshares->updated_at = date('Y-m-d H:i:s');
        	$user_socialshares->save();
        }
        else
        {
        	$usersocialshare = new UserSocialShare;
        	$usersocialshare->user_id = $user->id;
        	$usersocialshare->socialsite = "alternativeto";
        	$usersocialshare->paid_status = 0;
        	$usersocialshare->save();
        }
        return response()->json(['success'=>'Data is successfully added']);
    }

}
