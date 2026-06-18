<?php

namespace App\Jobs;

use App\Models\Sales;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SalesCsvProcess implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $path = resource_path("temp");
        $files = glob("$path/*.csv");
        $header = [];
        foreach ($files as $key =>  $file) {
            $data = array_map('str_getcsv', file($file));
            if($key == 0){
                $header = $data[0];
                unset($data[0]);
            }
            foreach ($data as $item) {
                $saleData = array_combine($header, $item);
                Sales::create($saleData);
            }
            unlink($file); 
        }
    }
}
