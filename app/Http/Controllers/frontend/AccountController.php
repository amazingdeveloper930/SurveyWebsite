<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Campaign;
use Validator;
use Auth;
use File;
use Image;
use Hash;
use Session;
use DB;

class AccountController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $language_list = unserialize(Auth::guard('web')->user()->language_list);
        $entries = array();

       //  if(Auth::guard('web')->user()->language_list == null && Auth::guard('web')->user()->language_list = '')
       //     {
       //          $entries = Campaign::where('active', '=', 1)
       //          ->where('public', '=', 1)
       //          ->orderBy('advertise_credits', 'desc')
       //          ->paginate(20);
       //     }
       // else

       //  $entries = Campaign::where('active', '=', 1)
       //      ->where('public', '=', 1)
       //      ->whereIn('language', $language_list)
       //      ->orderBy('advertise_credits', 'desc')
       //      ->paginate(20);

        if(Auth::guard('web')->user()->language_list == null || Auth::guard('web')->user()->language_list == '')
        {
             $entries = DB::select('SELECT * FROM campaigns AS c where advertise_credits > (SELECT COUNT(*) FROM campaigns_results AS cr WHERE cr.campaign_id = c.id)

            AND id not in (SELECT 
                distinct campaign_id
            FROM
                campaigns_results AS cr
            WHERE
                cr.user_id = '.Auth::guard('web')->user()->id.') 
                AND c.public = 1 AND c.active = 1 ORDER BY advertise_credits DESC LIMIT 10');
        }
        else{

        $entries = DB::select('SELECT * FROM campaigns AS c where advertise_credits > (SELECT COUNT(*) FROM campaigns_results AS cr WHERE cr.campaign_id = c.id)

        AND id not in (SELECT 
            distinct campaign_id
        FROM
            campaigns_results AS cr
        WHERE
            cr.user_id = '.Auth::guard('web')->user()->id.') 
            AND ( c.language in ('.implode(',', $language_list).'))
            AND c.public = 1 AND c.active = 1 ORDER BY advertise_credits DESC LIMIT 10');
        }



        return view('frontend.account.index',['entries' => $entries]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'username'  => 'required|unique:users,username,' . Auth::user()->id,
            'photo'     => 'mimes:jpeg,gif,bmp,png',
        ]);

        $entry = Auth::user();

        $entry->username = $request->username;

        if ($request->has('password')) {

            $this->validate($request, [
            'password_confirmation'  => 'required'
            ]);
        
            $entry->password = Hash::make((string)$request->password);
        }

        // Uploading photo
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            if ($file->isValid()) {
                $path   = 'uploads/users/photos/' . base64_encode($entry->id) . '/';
                $name   = $file->getClientOriginalName();

                // deleting old if exists
                File::deleteDirectory($path);

                // creating directories
                File::makeDirectory($path . 'default', 0777, true, true);

                // Save
                $file->move($path . 'default/', $name);

                // Resize if needed
                if (Image::make($path . 'default/' . $name)->width() > 200)
                    Image::make($path . 'default/' . $name)->widen(200)->save();

                // Assign images
                $entry->photo = $path . 'default/' . $name;
            }
        }

        $entry->save();
        
        Session::flash('success','Profile updated successfully.');
        
        return redirect()->route('account.index');
    }
    public function get_available_poll(Request $request)
    {
        $entry = Auth::user();
        $available_poll = array();
        if($entry->gender == null || $entry->gender == "")
            $available_poll[] = 1;
        if($entry->occupation == null || $entry->occupation == "")
            $available_poll[] = 2;
        if($entry->language_list == null || $entry->language_list == "")
            $available_poll[] = 3;
        if($entry->country == null || $entry->country == "")
            $available_poll[] = 4;
        if($entry->birth_year == null || $entry->birth_year == "")
            $available_poll[] = 5;
        if(count($available_poll) > 1 && $request->has('current_poll'))
        {
            if (($key = array_search($request->current_poll, $available_poll)) !== false) 
                unset($available_poll[$key]);
        }
        $poll_array = array();           
        foreach ($available_poll as $key => $value) {
            # code...
            $poll_array []= $value;
        }

        $random_index = rand(0, count($poll_array) - 1);
        if(count($poll_array) == 0)
            $random_index = -1;
        return response()->json(['index' => $random_index >= 0? $poll_array[$random_index]:-1]);
    }

    public function update_polls(Request $request)
    {
        $entry = Auth::user();
        if($request->has('gender'))
        {
            $entry->gender = $request->gender;
        }
        if($request->has('birth_year'))
        {
            $entry->birth_year = date('Y') - $request->birth_year;
        }
        if($request->has('country'))
        {
            $entry->country = $request->country;
        }
        if($request->has('occupation'))
        {
            $entry->occupation = $request->occupation;
        }
        if($request->has('language'))
        {
            $language_list = $request->language;
            foreach ($language_list as $key => $value) {
                # code...
                $language_list[$key] = (int)($language_list[$key]);
            }
            $entry->language_list = serialize($language_list);
        }
        $entry->save();

        return response()->json(['success'=>'Data is successfully updated']);
    }
}