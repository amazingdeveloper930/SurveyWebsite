<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Campaign;
use App\CampaignResult;
use App\User;
use Mail;
use Carbon\Carbon;

class publicSurveyNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'publicSurveyNotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Service to send out emails after 1 day of survey creation if the survey is public';

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
        $handle = fopen(__DIR__.'/publicemail.csv', 'a+');
        $surveys = Campaign::where([['created_at', '>=', Carbon::parse('-25 hours')],['created_at', '<=', Carbon::parse('-23 hours')],['public','=',\DB::raw('0')]])->get();
        
        foreach ($surveys as $key => $value) {
            echo $value->user_id;

            // $responses = CampaignResult::where([['campaign_id','=',$value->id]])->get();
            $user = User::find($value->user_id);
            // print_r(array($user->id,$user->email));
            $link = \Autologin::to($user,'/my_surveys');
            $data = [

            'link'=>$link,
            'survey_name' => $value->title
            ];
            // fputcsv($handle, array($user->email,$value->id));
            Mail::send('emails.notifications.publicSurveyNotification',$data, function ($message) use($user)
            {
            $message->from("info@pollanimal.com");
            $message->to($user->email);          
            // $message->to('jlmobile710@gmail.com');
            $message->subject('Promote your survey @ Poll Animal');
            });
        }
        fclose($handle);
    }
}
