<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\SurveyEmail::class,
        Commands\publicSurveyNotification::class,
        Commands\SurveyAnswerPerWeekEmail::class,
        Commands\ActivationNotify::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('email:activation-notify')->hourly();
        $schedule->command('Email:SurveyAnswerPerWeek')->weeklyOn(0, '8:00');
        // $schedule->command('SurveyEmail')->everyMinute();
        $schedule->command('publicSurveyNotification')->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
