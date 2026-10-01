<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Login | Portfolio</title>
    
    {{-- Cloudflare Turnstile Script --}}
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    
    <style>
        :root {
            /* Same theme variables as main site */
            --bg-body: #F8FAFC;
            --bg-card: #FFFFFF;
            --bg-alt: #F1F5F9;
            --text-primary: #0F172A;
            --text-body: #334155;
            --text-muted: #64748B;
            --border-color: #E2E8F0;
            --blue-50: #EFF6FF;
            --blue-500: #3B82F6;
            --blue-600: #2563EB;
            --radius-lg: 16px;
        }

        [data-theme="dark"] {
            --bg-body: #0F172A;
            --bg-card: #1E293B;
            --bg-alt: #0B1120;
            --text-primary: #F8FAFC;
            --text-body: #CBD5E1;
            --text-muted: #94A3B8;
            --border-color: #334155;
            --blue-50: rgba(59,130,246,0.15);
            --blue-500: #3B82F6;
            --blue-600: #3B82F6;
        }

        body {
            margin: 0; font-family: 'Inter', sans-serif;
            background: var(--bg-body); color: var(--text-body);
            display: flex; align-items: center; justify-content: center;
            min-height: 100vh; padding: 20px;
        }

        .login-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            width: 100%; max-width: 420px;
            padding: 40px;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.1);
        }

        h2 { font-size: 24px; font-weight: 800; color: var(--text-primary); margin: 0 0 8px; text-align: center; }
        p.subtitle { font-size: 14px; color: var(--text-muted); margin: 0 0 32px; text-align: center; line-height: 1.5; }

        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-size: 13px; font-weight: 600; margin-bottom: 8px; color: var(--text-primary); }
        .form-control {
            width: 100%; padding: 14px 16px; box-sizing: border-box;
            background: var(--bg-alt); border: 1.5px solid var(--border-color);
            border-radius: 12px; font-family: inherit; font-size: 15px; color: var(--text-primary);
            transition: all 0.2s;
        }
        .form-control:focus { outline: none; border-color: var(--blue-500); box-shadow: 0 0 0 3px rgba(59,130,246,0.15); }

        .btn-primary {
            width: 100%; padding: 14px;
            background: var(--blue-600); color: #FFF;
            border: none; border-radius: 12px;
            font-family: inherit; font-size: 15px; font-weight: 600;
            cursor: pointer; transition: all 0.2s;
        }
        .btn-primary:hover { background: #1D4ED8; transform: translateY(-1px); }

        .step-2 { display: none; }
        
        .cf-wrapper { margin: 24px 0; display: flex; justify-content: center; }
        
        .otp-inputs { display: flex; gap: 8px; justify-content: center; margin-bottom: 24px; }
        .otp-inputs input {
            width: 48px; height: 56px; text-align: center;
            font-size: 24px; font-weight: 700;
            font-family: 'JetBrains Mono', monospace;
        }
    </style>
</head>
<body>

    <div class="login-card">
        
        {{-- Flash Messages --}}
        @if(session('error'))
            <div style="padding: 12px; background: #fee2e2; color: #b91c1c; border-radius: 8px; margin-bottom: 20px; font-size: 14px; text-align: center;">
                {{ session('error') }}
            </div>
        @endif
        @if(session('message'))
            <div style="padding: 12px; background: #dcfce3; color: #15803d; border-radius: 8px; margin-bottom: 20px; font-size: 14px; text-align: center;">
                {{ session('message') }}
            </div>
        @endif

        {{-- STEP 1: Enter Email --}}
        <div id="step-1-form" style="display: {{ session('step') == 2 ? 'none' : 'block' }}">
            <h2>Secure Access</h2>
            <p class="subtitle">Enter your admin email to receive a secure login link or code.</p>
            
            <form action="{{ route('login.send-otp') }}" method="POST" id="emailForm">
                @csrf
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" class="form-control" name="email" placeholder="edward@example.com" value="{{ session('login_email', '') }}" required>
                </div>

                {{-- Cloudflare Turnstile Widget --}}
                <div class="cf-wrapper">
                    <div class="cf-turnstile" data-sitekey="1x00000000000000000000AA"></div>
                </div>

                <button type="submit" class="btn-primary">Send Code via Email</button>
            </form>
        </div>

        {{-- STEP 2: Enter OTP --}}
        <div id="step-2-form" style="display: {{ session('step') == 2 ? 'block' : 'none' }}">
            <h2>Enter Security Code</h2>
            <p class="subtitle">We've sent a 6-digit code to your email. This code expires in 5 minutes.</p>
            
            <form action="{{ route('login.verify-otp') }}" method="POST">
                @csrf
                <div class="otp-inputs">
                    <input type="text" name="otp_1" class="form-control" maxlength="1" onkeyup="moveNext(this, 1)" required>
                    <input type="text" name="otp_2" class="form-control" maxlength="1" id="otp-1" onkeyup="moveNext(this, 2)" required>
                    <input type="text" name="otp_3" class="form-control" maxlength="1" id="otp-2" onkeyup="moveNext(this, 3)" required>
                    <input type="text" name="otp_4" class="form-control" maxlength="1" id="otp-3" onkeyup="moveNext(this, 4)" required>
                    <input type="text" name="otp_5" class="form-control" maxlength="1" id="otp-4" onkeyup="moveNext(this, 5)" required>
                    <input type="text" name="otp_6" class="form-control" maxlength="1" id="otp-5" required>
                </div>

                <button type="submit" class="btn-primary">Verify & Login</button>
            </form>
            
            <div style="text-align: center; margin-top: 24px;">
                <a href="#" onclick="showStep1()" style="color: var(--text-muted); font-size: 13px; text-decoration: none;">← Use a different email</a>
            </div>
        </div>

    </div>

    <script>
        function showStep2() {
            document.getElementById('step-1-form').style.display = 'none';
            document.getElementById('step-2-form').style.display = 'block';
        }
        function showStep1() {
            document.getElementById('step-2-form').style.display = 'none';
            document.getElementById('step-1-form').style.display = 'block';
        }
        
        // Auto-move focus for OTP inputs
        function moveNext(input, nextId) {
            if (input.value.length === 1) {
                document.getElementById('otp-' + nextId)?.focus();
            }
        }
    </script>
</body>
</html>
