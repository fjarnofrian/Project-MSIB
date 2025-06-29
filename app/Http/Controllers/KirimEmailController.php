<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailSend;
use Illuminate\Support\Facades\Mail;

class KirimEmailController extends Controller
{
    public function index()
    {
        return view('mailtemplate');
    }

    public function kirim(Request $request)
    {
        $details = [
            'nama' => $request->nama,
            'email' => $request->email,
            'subject' => $request->subject,
            'komentar' => $request->komentar
        ];

        Mail::to($request->email)->send(new MailSend($details));

        return "Email telah dikirim!";
    }
}