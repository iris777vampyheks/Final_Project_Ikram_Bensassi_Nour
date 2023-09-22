<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailtest;

class MailController extends Controller
{
    public function sendEmail()
    {
        $recipientEmail = 'bensassin6@gmail.com';

        Mail::to($recipientEmail)->send(new Mailtest());


        return "Email sent successfully";
    }
}
