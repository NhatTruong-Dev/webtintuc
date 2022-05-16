<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use App\Jobs\SendMail;

class JobController extends Controller
{
    public function processQueue()
    {
        $notiJob = new SendMail();
        SendMail::dispatch($notiJob) ->delay(20);
    }
}
