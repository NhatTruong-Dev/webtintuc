<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
        ]);

        $data = [
            'subject' => $request->subject,
            'email' => $request->email,
        ];

        Mail::send('email-template', $data, function($message) use ($data) {
            $message->to($data['email'])
                ->subject($data['subject']);
        });
        Toastr::success('Gửi email thành công');
        return back();
    }
}
