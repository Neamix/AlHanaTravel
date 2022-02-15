<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImageProcessing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $dimintionsArray;
    protected $modal;
    protected $use_for;
    protected $file;

    public function __construct($file,$dimintionsArray,$modal,$use_for)
    {
        $this->dimintionsArray = $dimintionsArray;
        $this->modal = $modal;
        $this->use_for = $use_for;
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Image::storeImages($this->file,$this->dimintionsArray,$this->modal,$this->use_for);
    }
}
