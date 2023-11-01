<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Mail\BookDataMail;

class SendBookDataEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $bookData;

    public function __construct($bookData)
    {
        $this->bookData = $bookData;
    }

    public function handle()
    {
        Mail::to('recipient@example.com')
            ->send(new BookDataMail($this->bookData));
    }
}
