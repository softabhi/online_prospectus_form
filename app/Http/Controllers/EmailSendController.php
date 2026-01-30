<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EmailSendController extends Controller
{
    function index()
    {
        $data = array('name' => "Virat Gandhi");

        Mail::send(['text' => 'mail'], $data, function ($message) {
            $message->to('rohit83015@gmail.com', 'laravel')->subject('Laravel Basic Testing Mail');
            $message->from('rohit83013@gmail.com', 'Virat Gandhi');
        });
        echo "Basic Email Sent. Check your inbox.";
    }
}
