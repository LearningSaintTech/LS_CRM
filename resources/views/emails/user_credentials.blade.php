<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your Account Credentials - {{ config('app.name') }}</title>
</head>
<body style="margin:0; padding:0; background-color:#f8fafc; font-family:'Segoe UI', Arial, Helvetica, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#f8fafc">
    <tr>
        <td align="center" style="padding:40px 20px;">
            
            <!-- MAIN CARD -->
            <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e2e8f0;">
                
                <!-- HEADER WITH GRADIENT -->
                <tr>
                    <td bgcolor="#4f46e5" style="background:linear-gradient(135deg, #4f46e5 0%, #3730a3 100%); padding:30px 40px;" align="center">
                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="center">
                                    <!-- LOGO -->
                                    <img src="https://www.woodcroftuniversity.online/assets/img/Woodcraft_logo_header_final.svg"
                                         alt="{{ config('app.name') }} Logo"
                                         style="max-width:200px; height:auto; display:block;">
                                    
                                    <!-- WELCOME TITLE -->
                                    <h1 style="color:#ffffff; font-size:26px; font-weight:700; margin-top:20px; margin-bottom:5px; line-height:1.3;">
                                        Welcome, {{ $user->name }}!
                                    </h1>
                                    <p style="color:#c7d2fe; font-size:15px; margin:0; line-height:1.5;">
                                        Your account has been successfully created
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                <!-- CONTENT AREA -->
                <tr>
                    <td style="padding:40px;">
                        
                        <!-- INTRODUCTION TEXT -->
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="color:#334155; font-size:15px; line-height:1.6; padding-bottom:25px;">
                                    Thank you for joining us! Below are your login credentials. Please keep this information secure.
                                </td>
                            </tr>
                        </table>
                        
                        <!-- CREDENTIALS CARD -->
                        <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f8fafc; border-radius:10px; border:1px solid #e2e8f0; overflow:hidden; margin-bottom:30px;">
                            
                            <tr>
                                <td style="padding:25px;">
                                    <!-- CARD HEADER -->
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td style="padding-bottom:20px;">
                                                <h2 style="color:#1e293b; font-size:18px; font-weight:600; margin:0; display:flex; align-items:center;">
                                                    <span style="background-color:#4f46e5; color:white; width:28px; height:28px; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; margin-right:10px; font-size:14px;">🔐</span>
                                                    Your Login Credentials
                                                </h2>
                                            </td>
                                        </tr>
                                    </table>
                                    
                                    <!-- EMAIL ROW -->
                                    <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:15px;">
                                        <tr>
                                            <td width="100" style="color:#64748b; font-size:14px; font-weight:600; padding-bottom:5px;">
                                                Email:
                                            </td>
                                            <td style="color:#1e293b; font-size:15px; font-weight:500;">
                                                {{ $user->email }}
                                            </td>
                                        </tr>
                                    </table>
                                    
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td width="100" style="color:#64748b; font-size:14px; font-weight:600; padding-bottom:5px;">
                                                Password:
                                            </td>
                                            <td style="color:#1e293b; font-size:15px; font-weight:500;">
                                                {{ $password }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        
                        <!-- SECURITY WARNING -->
                        <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#fff7ed; border-radius:8px; border-left:4px solid #f97316; margin-bottom:30px;">
                            <tr>
                                <td style="padding:18px 20px;">
                                    <table>
                                        <tr>
                                            <td width="30" style="color:#f97316; font-size:18px; vertical-align:top; padding-right:10px;">
                                                ⚠️
                                            </td>
                                            <td>
                                                <p style="color:#7c2d12; font-size:14px; line-height:1.5; margin:0; font-weight:500;">
                                                    <strong>Security Notice:</strong> For your protection, please change your password immediately after your first login.
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        
                        <!-- LOGIN BUTTON -->
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="center" style="padding-bottom:30px;">
                                    <a href="{{ url('/login') }}"
                                       style="background:linear-gradient(135deg, #4f46e5 0%, #3730a3 100%); 
                                              color:#ffffff; text-decoration:none; font-size:15px; 
                                              padding:14px 32px; border-radius:8px; 
                                              display:inline-block; font-weight:600; 
                                              box-shadow:0 4px 12px rgba(79, 70, 229, 0.3);
                                              transition:all 0.3s ease;">
                                        Login to Your Account
                                    </a>
                                </td>
                            </tr>
                        </table>
                        
                        <!-- SUPPORT TEXT -->
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="center" style="color:#64748b; font-size:13px; line-height:1.6; padding-top:20px; border-top:1px solid #e2e8f0;">
                                    <p style="margin:0 0 10px 0;">
                                        Need help? Contact our support team at 
                                        <a href="mailto:support@woodcroftuniversity.online" style="color:#4f46e5; text-decoration:none;">support@woodcroftuniversity.online</a>
                                    </p>
                                    <p style="margin:0;">
                                        This is an automated message. Please do not reply to this email.
                                    </p>
                                </td>
                            </tr>
                        </table>
                        
                    </td>
                </tr>
                
                <!-- FOOTER -->
                <tr>
                    <td bgcolor="#f1f5f9" style="padding:25px 40px;">
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="center">
                                    <p style="color:#475569; font-size:13px; line-height:1.5; margin:0 0 10px 0;">
                                        Regards,
                                    </p>
                                    <p style="color:#1e293b; font-size:15px; font-weight:600; margin:0 0 15px 0;">
                                        The {{ config('app.name') }} Team
                                    </p>
                                    <p style="color:#64748b; font-size:12px; margin:0;">
                                        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
            </table>
            
            <!-- MOBILE FRIENDLY SPACING -->
            <table width="100%" cellpadding="0" cellspacing="0" style="max-width:600px; margin-top:20px;">
                <tr>
                    <td align="center" style="color:#94a3b8; font-size:12px; padding:15px;">
                        This email was sent to {{ $user->email }}
                    </td>
                </tr>
            </table>
            
        </td>
    </tr>
</table>

</body>
</html>