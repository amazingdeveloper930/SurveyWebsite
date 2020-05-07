<?php

namespace App\Http\Controllers\frontend;
use Notifiable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Hash;
use Session;
use App\User;

class RemindersController extends Controller
{

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return view('frontend.password.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind(Request $request)
	{
	    $this->validate($request, [
	        'email' => 'required|email|exists:users'
        ]);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );
		
		//echo RESET_LINK_SENT;die();

        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($response)
            : $this->sendResetLinkFailedResponse($request, $response);
	}

    protected function sendResetLinkResponse($response)
    {
        return back()->with('status', trans($response));
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return back()->withErrors(
            ['email'    => trans($response)]
        );
    }

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) {
		    abort(404);
        }

		return view('frontend.password.reset', [
            'token'     => $token
        ]);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset(Request $request)
	{
		$data = User::where("email",$request->email)->first();
		if($data){
			$find= User::find($data->id);
			$find->password =  Hash::make($request->password);
			$find->save();
			Session::flash("success","Password reset successfully!");
			return redirect()->route('login');
		}else{
			$result = "No email found in database";
		}
		Session::flash("error","Email not found!");
		return redirect()->back();
		


		
		
	}

    public function success()
    {
        return view('frontend.password.success');
    }

    public function broker()
    {
        return Password::broker();
    }

    protected function credentials(Request $request)
    {
        return $request->only('email', 'password', 'password_confirmation', 'token');
    }
}
