<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Jobs\UpdatePaymentStatus;

class Kernel extends ConsoleKernel
{
    
    protected $commands = [
        Commands\PaymentStatus::class,
    ];


    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('payment_status:cron')->everyMinute();

        $schedule->job(new UpdatePaymentStatus())->everyTwoMinutes();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
