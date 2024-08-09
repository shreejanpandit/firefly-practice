<?php

namespace App\Http\Controllers;

use App\Mail\DemoTestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Mail from fireflyIT.com',
            'body' => 'This is for testing email using smtp. Hope the mail gets to the right person'
        ];

        Mail::to('shreezanpandit@gmail.com')->send(new DemoTestMail($mailData));

        dd("Email is sent successfully.");
    }
}
