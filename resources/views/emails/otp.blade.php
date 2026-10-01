<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f8fafc; padding: 20px; }
        .container { max-width: 500px; margin: 0 auto; background: #ffffff; padding: 32px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .code { font-size: 32px; font-weight: bold; letter-spacing: 8px; color: #2563eb; text-align: center; margin: 24px 0; padding: 16px; background: #eff6ff; border-radius: 8px; }
        .footer { margin-top: 32px; font-size: 12px; color: #64748b; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Security Code</h2>
        <p>Hello Edward,</p>
        <p>Someone requested to log in to your portfolio admin dashboard. Please use the following 6-digit security code to complete the login process:</p>
        
        <div class="code">{{ $otp }}</div>
        
        <p>This code will expire in 5 minutes. If you did not request this, please ignore this email.</p>
        
        <div class="footer">
            &copy; {{ date('Y') }} Portfolio Admin.
        </div>
    </div>
</body>
</html>
