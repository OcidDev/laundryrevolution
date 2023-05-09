<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

class TesMail extends Controller
{
    public function index()
    {
        // $details = [
        //     'title' => 'Mail from ItSolutionStuff.com',
        //     'body' => 'This is for testing email using smtp'
        // ];
        $details = 'tes';


        // dd($details['title']);
        Mail::to('rosyid3003@gmail.com')->send(new \App\Mail\MyTestMail($details));

        // return view('name',$details);
    }
}
