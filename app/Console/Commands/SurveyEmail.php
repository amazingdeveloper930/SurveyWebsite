<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Campaign;
use App\User;
use Mail;
// use Autologin;

class SurveyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SurveyEmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Service to send out emails after 1 hour of survey creation if the survey is not launched';

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
        // $me = User::where('email','eastern.star930@gmail.com')->first();
        // $me->country += 1;
        // $me -> save();
        $handle = fopen(__DIR__.'/email.csv', 'a+');
        $surveys = Campaign::where([['created_at', '>=', \DB::raw('NOW() - INTERVAL 61 MINUTE')],['created_at', '<=', \DB::raw('NOW() - INTERVAL 59 MINUTE')],['public','=',\DB::raw('0')]])->get();
        
        foreach ($surveys as $key => $value) {
            $user = User::find($value->user_id);
            print_r(array($user->id,$user->email));
            $link = \Autologin::to($user,'/my_surveys');
            $data = [
            'link'=>$link
            ];
            fputcsv($handle, array($user->email,$value->id));
            Mail::send('emails.notifications.SurveyEmails',$data, function ($message) use($user)
            {
            $message->from("info@pollanimal.com");
            // $message->to($user->email);
            $message->to('jlmobile710@gmail.com');
            $message->subject('Launch your survey @ Poll Animal');
            });
        }
        fclose($handle);
    }
}
