<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {
        $details=[
            'title'=>'Mail from Derrick AHOUISSOUSSI',
            'body'=>'Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.',
        ];
        Mail::to("ahouissoussiderrick@gmail.com")->send(new TestMail($details));
        return "Email sent";
    }
}
