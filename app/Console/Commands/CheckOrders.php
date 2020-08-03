<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\user;
use App\order;
use Carbon\Carbon;

class CheckOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CheckOrders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'it will looking into ordars status';

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
     * @return int
     */
    public function handle()
    {
        $orders=order::where("end_time",'<=',Carbon::now())
        ->where('status', '1')
        ->get();
        foreach ($orders as $order) {
        $order->status=2;
        $order->save();
        }
        dd('قد تم اتمام المهمه اذهم لتري النتيجه ثم قم بالتقييم');
    }
}
