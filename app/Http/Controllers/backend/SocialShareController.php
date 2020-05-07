<?php

namespace App\Http\Controllers\backend;

use App\User;
use App\Campaign;
use App\UserCredit;
use App\UserSocialShare;

use Credits;
use DB;
use SocialShare;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialShareController extends Controller
{
    //
	public function __construct()
	{
	    $this->middleware(['admin']);
	}

	public function survey()
	{
		return view('backend.socialshare.index', [
		    'campaigns' => Campaign::join('users', 'campaigns.user_id', '=', 'users.id')
		    ->select('campaigns.id', 'campaigns.user_id', 'campaigns.shared', 'campaigns.shared_at', 'users.username', 'users.email')
		    ->where('campaigns.shared', '>', 0)->orderBy('campaigns.shared_at', 'desc')
		    ->paginate()
        ]);

	}

	public function general()
	{
		return view('backend.socialshare.general', [
		    'users' => UserSocialShare::join('users', 'users_socialshare.user_id', '=', 'users.id')
		    	->select('users_socialshare.*', 'users.username', 'users.email')
		    	->orderBy('users_socialshare.created_at', 'desc')->paginate()
        ]);

	}

	public function add_free_credit($share_id, Request $request)
	{
		$share_entry = UserSocialShare::find($share_id);
		$user_id = $share_entry->user_id;
		$entry = User::find($user_id);
		if ($entry) {
			$credits = new UserCredit;
            $credits->user_id     = $user_id;
            $credits->description = 'For Social Share';
            $credits->credits     = $request->free_credit;
            $credits->save();
            $share_entry->paid_at = date('Y-m-d H:i:s');
            $share_entry->paid_status = 1;
            $share_entry->save();
		}
		return redirect()->route('socialshare.general');
	}
}









