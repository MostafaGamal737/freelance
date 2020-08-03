<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\ResetPassord;
use App\user;
class ResetPasswordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
     private $user;
    public function __construct($user)
    {
        $this->user=$user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
     public function handle()
     {
         $this->user->notify(new ResetPassord($this->user));
     }
}
