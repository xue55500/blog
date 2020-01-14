<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function sendemail()
    {
        Mail::to('1153619867@qq.com')->send(new OrderShipped());
    }
}
