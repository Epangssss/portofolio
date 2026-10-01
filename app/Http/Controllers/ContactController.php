<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'subject' => 'required|string|max:200',
            'message' => 'required|string'
        ]);

        // Coba gunakan ADMIN_EMAIL, jika tidak ada, gunakan MAIL_USERNAME dari setting SMTP
        $adminEmail = env('ADMIN_EMAIL', env('MAIL_USERNAME'));

        if (!$adminEmail) {
            return back()->withFragment('contact')->with('contact_error', 'Gagal: Email admin belum diatur.');
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        try {
            Mail::to($adminEmail)->send(new ContactMail($data));
            return back()->withFragment('contact')->with('contact_success', 'Pesan berhasil terkirim!');
        } catch (\Exception $e) {
            return back()->withFragment('contact')->with('contact_error', 'Gagal mengirim pesan: ' . $e->getMessage());
        }
    }
}
