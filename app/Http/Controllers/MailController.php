<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;
use App\Mail\websiteMail;


class MailController extends Controller
{
    public function mail_send()
    {
 
        $subject = 'this a test email';
        $message = 'hi i am ahmed how are you';

        \Mail::to('ar7933870@gmail.com')->send(new websiteMail($subject, $message));

        echo 'email send successfully';

    }
}
