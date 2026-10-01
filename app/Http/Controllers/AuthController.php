<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\OtpMail;

class AuthController extends Controller
{
    // Ambil email murni dari file .env (Tidak ada fallback hardcode lagi)
    private function getAdminEmail() {
        return env('MAIL_USERNAME');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function sendOtp(Request $request)
    {
        // 1. Validasi Input (termasuk validasi Cloudflare nanti jika aktif)
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->input('email');

        // 2. Cek apakah email sesuai dengan Database / Admin Email
        if ($email !== $this->getAdminEmail()) {
            return back()->with('error', 'Akses Ditolak: Email tidak diizinkan.');
        }

        // 3. Generate Kode OTP 6 Digit
        $otp = rand(100000, 999999);

        // 4. Simpan OTP ke Session sementara (berlaku 5 menit)
        Session::put('login_otp', $otp);
        Session::put('login_email', $email);
        Session::put('login_expires_at', now()->addMinutes(5));

        // 5. Kirim OTP ke Gmail via Mailable
        try {
            Mail::to($email)->send(new OtpMail($otp));
            return back()->with('step', 2)->with('message', 'Kode OTP telah dikirim ke email kamu!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim email. Pastikan pengaturan SMTP di .env sudah benar. ('. $e->getMessage() .')');
        }
    }

    public function verifyOtp(Request $request)
    {
        // Dapatkan OTP dari input array
        $inputOtp = $request->input('otp_1') . $request->input('otp_2') . $request->input('otp_3') . 
                    $request->input('otp_4') . $request->input('otp_5') . $request->input('otp_6');

        $sessionOtp = Session::get('login_otp');
        $expiresAt = Session::get('login_expires_at');

        if (!$sessionOtp || now()->greaterThan($expiresAt)) {
            return back()->with('error', 'Kode OTP sudah kadaluarsa. Silakan minta kode baru.');
        }

        if ($inputOtp == $sessionOtp) {
            // Berhasil Login!
            // Di sini kamu bisa login ke Auth bawaan Laravel: Auth::loginUsingId(1);
            
            Session::forget(['login_otp', 'login_expires_at']); // hapus sesi otp
            
            // Beri akses admin (sementara menggunakan session token sederhana)
            Session::put('is_admin', true);

            return redirect('/admin/dashboard')->with('message', 'Login Berhasil! Selamat datang di Dashboard.');
        }

        return back()->with('step', 2)->with('error', 'Kode OTP salah!');
    }
}
