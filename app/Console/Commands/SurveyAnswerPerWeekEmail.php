<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Campaign;
use App\CampaignResult;
use App\User;
use Mail;
use Carbon\Carbon;

class SurveyAnswerPerWeekEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Email:SurveyAnswerPerWeek';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Service to send out emails per thursday by user';

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
        //

        $handle = fopen(__DIR__.'/surveyanserperweek.csv', 'a+');
        $surveys = Campaign::where([[\DB::raw('date(created_at)'), '>=', Carbon::parse('-169 hours')],['public','=',\DB::raw('1')]])->get();

        $users = User::where('status', 1)
                    ->where('email_verification', 1)
                    ->get();
        foreach ($users as $user) {
            # code...
             $surveys = Campaign::where('active', '=', 1)
                ->where('public', '=', 1)
                ->where('user_id', $user->id)
                ->orderBy('advertise_credits', 'desc')
                ->get();

            $link = \Autologin::to($user,'/my_surveys');

            $email_data = array();
            if (isset($surveys) && !empty($surveys)) {
                foreach ($surveys as $key => $value) {

                    $answers  = CampaignResult::where('campaign_id', '=', $value->id)
                            ->where(\DB::raw('date(created_at)'), '>', \DB::raw('DATE(NOW() - INTERVAL 7 DAY)'))
                            ->count(); 
                    if($answers > 0 ){
                        $temp = array();
                        $temp['survey_name'] = $value -> title;
                        $temp['survey_count'] = $answers;    
                        $email_data[] = $temp;      
                    }        
                }
            }
            if(count($email_data) > 0){
                fputcsv($handle, array($user->email,count($email_data)));
                $data= [
                    'email_data' => $email_data,
                    'link' =>$link
                ];

                Mail::send('emails.notifications.SurveyAnswerPerWeekEmail',$data, function ($message) use($user)
                {
                    $message->from("info@pollanimal.com");
                    $message->to($user->email);                    
                    // $message->to('jlmobile710@gmail.com');
                    $message->subject('You have received answers @ Poll Animal');
                });

                // $me = User::where('email','eastern.star930@gmail.com')->first();
                // $me->country = $me->country + 1;
                // $me -> save();
            }
        }
        
        fclose($handle);
    }
}
