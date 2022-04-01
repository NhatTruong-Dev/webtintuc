<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Jobs\SendNotiQueue;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function processQueue()
    {
        $notiJob = new SendMail();
        SendMail::dispatch($notiJob) ->delay(20);
    }
}
