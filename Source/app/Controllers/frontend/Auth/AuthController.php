<?php
namespace App\Http\Controllers\frontend\Auth;
use Auth;
use App\User;
use App\UserCredit;
use Socialite;
use Validator;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use DB;
use Mail;
use Hash;
use Session;
Use Credits;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    use RegistersUsers, ThrottlesLogins;
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
            $this->middleware('guest')->except('logout');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
	 
	protected function showLoginForm()
	{
		if(Auth::check()){
			
		}else {
			return view('auth/login');
		}
	
	}
	
	protected function showRegisterForm()
	{
		return view('auth/register');
	}

	
	protected function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (auth()->attempt(array('email' => $request->input('email'), 'password' => $request->input('password'))))
        {
			//print_r(auth()->user());die();
            if(auth()->user()->email_verification == '0'){
              Auth::logout();
			  Session::flash('error',app('translator')->getFromJson('frontend/login.Error_1'));
			   return redirect()->back();
            }else {
            	Auth::user()->last_login = Carbon::now()->toDateTimeString();
	            Auth::user()->save();
				return redirect()->route('campaigns.my')->withLogned(1);
			}
			
        }else{
			Session::flash('error',app('translator')->getFromJson('frontend/login.Error_2'));
			 return redirect()->back();
        }
		
		
	

    }
	

    public function register(Request $request)
    {
		   $this->validate($request, [
				'email' 				    => 'required|email|unique:users,email',
				'username' 			        => 'required|unique:users,username',
				'password' 			        => 'required|confirmed|min:5',
				'password_confirmation'     => 'required',
			]);
		   if(isset($request->language)){
			    $language_list = $request->language;
			    foreach ($language_list as $key => $value) {
			    	# code...
			    	$language_list[$key] = (int)$value;
			    }
			}
			$user = User::create([
			'username' => $request->username,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'gender' => $request->gender,
			'birth_year' => $request->year != null? $request->year + (int)date('Y') - 80: null,
			'country' => $request->country != null? $request->country: null,
			'language_list' => $request->language != null? serialize($language_list): null,
			'occupation' => $request->occupation != null? $request->occupation: null,
			]);
			

			if($user){
				$data = UserCredit::create([
				'user_id'       => $user->id,
				'credits'       => Credits::credits('registration_credits'),
				'description'   => 'Registration Credits'
				]);
			
		

            $user['link'] = str_random(30);

            DB::table('user_activations')->insert(['uid'=>$user['id'],'token'=>$user['link']]);
			
			
			$data = [
			'name'=>$user->name,
			'email'=>$user->email,
			'acc_activelnk'=>route('acc_activation',$user['link'])
			];


			Mail::send('emails.notifications.activation',$data, function ($message) use($user)
			{
			$message->from("info@pollanimal.com");
			$message->to($user->email);
			$message->subject('Welcome to Poll Animal');
			});
			
			// Session::flash('success','Account created, check inbox to activate account.');
			Session::flash('success',app('translator')->getFromJson('frontend/login.Account_created'));
			
           return redirect()->to('login');
}else{
	// echo "Some technical issues arrived. Please try again later.";
	echo app('translator')->getFromJson('frontend/login.Technical_issues');
}
       
    }


    public function userActivation($token)
    {
        $check = DB::table('user_activations')->where('token',$token)->first();
		
        if(!is_null($check)){
			
            $user = User::find($check->uid);

            if($user->email_verification == 1){
				// Session::flash('success','Account is already activated.');
				Session::flash('success',app('translator')->getFromJson('frontend/login.Account_already_created'));
                return redirect()->to('login');                

            }
            $user->email_verification = 1;
			
			$user->save();

            DB::table('user_activations')->where('token',$token)->delete();
			// Session::flash('success','Account activated successfully.');
			Session::flash('success',app('translator')->getFromJson('frontend/login.Account_activated'));
            return redirect()->to('login');
        }
		Session::flash('error',app('translator')->getFromJson('frontend/login.Error_3'));
        return redirect()->to('login');

    }
	
	
	
	
    protected function validator(array $data,array $message)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'mobile' => 'required|min:10|unique:users',
			'name' => 'required',
            'password' => 'required|min:6',
        ],$message);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
    /**
     * Redirect the user to the provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    /**
     * Obtain the user information from provider.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try {
			if($provider=='twitter'){
				 $user = Socialite::driver($provider)->user();
			}else{
				 $user = Socialite::driver($provider)->stateless()->user();
			}
           
        } catch (Exception $e) {
            return redirect('auth/'.$provider);
        }
        


        $authUser = $this->findOrCreateUser($user, $provider);

		if($authUser){
				$data = UserCredit::create([
				'user_id'       => $authUser->id,
				'credits'       => Credits::credits('registration_credits'),
				'description'   => 'Registration Credits'
				]);
		
		Auth::login($authUser, true);
		
		return redirect('my_surveys');
		
		}else{
			// echo "Some technical issues arrived. Please try again later.";
			echo app('translator')->getFromJson('frontend/login.Technical_issues');
		}
			
		
        
			
        //return redirect($this->redirectTo);
		  
    }
    
    
    /**
     * Find user based on Oauth details, or create one if none is found.
     */
    public function findOrCreateUser($user, $provider)
    {
		$authUser = User::where('email','=',$user->email)->orWhere('provider_id','=',$user->id)->first();
		
        if ($authUser) {
			
			$authUser->update([
                'username'     => $user->name,
				'email'    => ($user->email==NULL) ? '-' : $user->email,
				'photo'    => $user->avatar,
				'provider' => $provider,
				'provider_id' => $user->id,
            ]);
			
            return $authUser;
        }
		
		$password=$this->makePassword();
		
	
		 return User::create([
				'username'     => $user->name,
				'email'    => ($user->email==NULL) ? '-' : $user->email,
				'email_verification'=>1,
				'photo'    => $user->avatar,
				'password'    =>  Hash::make($password),
				'provider' => $provider,
				'provider_id' => $user->id,
			]);
		
		
    }
	
	public function logout()
	{
			Auth::logout();
			return redirect()->route('home');
	}
	 private function makePassword()
    {
        return time() + rand(1, 100);
    }

	
}

?>