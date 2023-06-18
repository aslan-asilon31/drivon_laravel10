<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Payment;
use Carbon\Carbon;


class UpdatePaymentStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // protected $status;

    public function __construct()
    {
        // $this->status = $status;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        \Mail::to('sulaslansetiawan1@gmail.com')->send(new \App\Mail\PaymentInfo());
    }
}
