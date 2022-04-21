<?php

namespace App\Http\Controllers;

use App\Mail\UserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(){
        $details=[
            'title'=>"Mail from NT",
            'body'=>"Hello",
        ];

        Mail::to("luongnhattruong2806@gmail.com")->send(new UserMail($details));


    }
}
