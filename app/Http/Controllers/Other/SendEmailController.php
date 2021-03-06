<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use App\Mail\NotifyMail;
use Illuminate\Support\Facades\Mail;
use function abort;

class SendEmailController extends Controller
{
    public function index()
    {

        Mail::to('abc@gmail.com')->send(new NotifyMail());

        if (Mail::failures()) {
            return abort(403,'Xin lỗi! Vui lòng gửi lại thư');
        }else{
            return abort(403,'Chúc mừng ! Thư đã được gửi thành công');
        }
    }
}
