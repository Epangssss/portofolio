<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f8fafc; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; padding: 32px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        h2 { color: #0F172A; }
        .info { margin-bottom: 20px; border-bottom: 1px solid #e2e8f0; padding-bottom: 16px; }
        .info p { margin: 4px 0; color: #475569; }
        .info strong { color: #1e293b; }
        .message-body { background: #f1f5f9; padding: 16px; border-radius: 8px; color: #334155; line-height: 1.6; white-space: pre-wrap; }
        .footer { margin-top: 32px; font-size: 12px; color: #94a3b8; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pesan Baru dari Portofolio</h2>
        
        <div class="info">
            <p><strong>Nama Pengirim:</strong> {{ $contactData['name'] }}</p>
            <p><strong>Email Pengirim:</strong> {{ $contactData['email'] }}</p>
            <p><strong>Subjek:</strong> {{ $contactData['subject'] }}</p>
        </div>

        <p><strong>Isi Pesan:</strong></p>
        <div class="message-body">{{ $contactData['message'] }}</div>
        
        <div class="footer">
            &copy; {{ date('Y') }} Portfolio Notification System.
        </div>
    </div>
</body>
</html>
