<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        Mail::to('halukbuyukozkan@gmail.com')->send(new MailNotify());
    }
}
