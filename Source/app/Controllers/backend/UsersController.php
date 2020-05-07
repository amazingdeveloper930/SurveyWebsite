<?php

namespace App\Http\Controllers\backend;

use App\User;
use App\Campaign;
use Auth;
use Illuminate\Http\Request;
use Validator;
use File;
use Image;
use App\Http\Controllers\Controller;
use Hash;
use Mail;

class UsersController extends Controller
{

	public function __construct()
	{
	    $this->middleware(['admin']);
	}

	public function index()
	{
		return view('backend.users.index', [
		    'users' => User::where('role', config('users.role.user'))->orderBy('created_at', 'desc')->paginate()
        ]);
	}

	public function create()
	{
		return view('backend.users.create', ['title' => 'New User']);
	}

	public function store(Request $request)
	{
		$this->validate($request, array(
			'email' 	=> 'required|email|unique:users',
			'username'  => 'required|unique:users',
			'password' 	=> 'nullable|confirmed|min:6',
			'photo' 	=> 'mimes:jpeg,gif,bmp,png',
		));

        $entry = new User;

        $entry->role 	    = config('users.role.user');
        $entry->email 		= $request->email;
        $entry->username 	= $request->username;
        $entry->password    = Hash::make((string)$request->password);
        $entry->status  	= $request->status;


        // Uploading photo
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');

            if ($file->isValid()) {
                $path 	= 'uploads/users/photos/' . base64_encode($entry->id) . '/';
                $name	= $file->getClientOriginalName();

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

        $entry->status = $request->status;

        $entry->save();

        return redirect()
            ->route('users.index')
            ->withStatus(trans('users.create'));
	}

	/**
     * Show user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        $credits = $user->credits()->orderBy('id', 'desc')->take(10)->get();


        if ($user) {
            return view('backend.users.show', [
                'user' => $user,
                'credits' => $credits
            ]);
        }
    }

	public function edit($id)
	{
        $entry = User::find($id);

		if ($entry) {
			 return view('backend.users.edit', [
                'user' => $entry,
             ]);
		}

		return redirect()->route('users.index');
	}

	public function update($id, Request $request)
	{
		$entry = User::find($id);

		if ($entry) {
			$this->validate($request, [
				'email' 	=> 'required|email|unique:users,email,' . $entry->id,
				'username'  => 'required|unique:users,username,' . $entry->id,
				'password' 	=> 'nullable|min:6',
				'photo' 	=> 'mimes:jpeg,gif,bmp,png',
			]);

            $entry->email 		= $request->email;
            $entry->username 	= $request->username;
            $entry->status  	= $request->status;

            if (!empty($request->password)) {
                $entry->password = Hash::make((string)$request->password);
            }

            // Uploading photo
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');

                if ($file->isValid()) {
                    $path 	= 'uploads/users/photos/' . base64_encode($entry->id) . '/';
                    $name	= $file->getClientOriginalName();

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

            return redirect()
                ->route('users.index')
                ->withStatus(trans('users.update'));
		}

		return redirect()->route('users.index');
	}

	public function status($id) {
        $entry = User::find($id);

        if ($entry) {
            $entry->email_verification = $entry->email_verification == 0 ? 1 : 0;

            $entry->save();

            return redirect()
                ->route('users.index')
                ->withStatus(trans('users.status'));
        }

        return redirect()->route('users.index');
    }

	public function search(){
		$search_txt = trim($_GET['query']);
		if(strlen($search_txt) > 0){

	return view('backend.users.index', [
		    'users' => User::where('username','LIKE','%' . $search_txt . '%')->orWhere('email','LIKE','%' . $search_txt . '%')->paginate()
        ]);


		}else{
			echo "Please type search text";
		}
	}
	public function destroy($id)
	{
		 $entry = User::find($id);

		 if ($entry) {
		 	$entry->campaigns()->delete();
		 	$entry->delete();

		 	return redirect()
                 ->route('users.index')
                 ->withStatus(trans('users.delete'));
		 }

		 return redirect()->route('users.index');
	}

}
