<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use Auth;
use App\User;
use DB;
use Carbon\Carbon;

class ActivationNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:activation-notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {        

        $useractivations = DB::table('user_activations')->where([['created_at', '>', Carbon::parse('-25 hours')],['created_at', '<', Carbon::parse('-23 hours')],['notified', '=' , NULL]])->get();

        foreach ($useractivations as $useractivate) {                        
            $user = User::where('id','=', $useractivate->uid)->first();
                            
            $data = [
            'name'=>$user->username,
            'email'=>$user->email,
            'acc_activelnk'=>route('acc_activation',$useractivate->token)
            ];


            Mail::send('emails.notifications.ActivationNotify',$data, function ($message) use($user)
            {
            $message->from("info@pollanimal.com");
            $message->to($user->email);
            // $message->to('jlmobile710@gmail.com');
            $message->subject('Welcome to Poll Animal');
            });

            DB::table('user_activations')->where('uid','=',$user['id'])->update(['notified'=>1]);            

        }
    }
}
