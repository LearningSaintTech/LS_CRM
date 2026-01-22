<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Credentials</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f8; font-family:Arial, Helvetica, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="padding:20px;">
    <tr>
        <td align="center">

            <!-- CARD -->
            <table width="600" cellpadding="0" cellspacing="0"
                   style="background-color:#ffffff; border-radius:8px; padding:30px;
                          border:1px solid #e5e7eb;">

                <!-- LOGO -->
                <tr>
                    <td align="center" style="padding-bottom:20px;">
                        <img src="https://www.woodcroftuniversity.online/assets/img/Woodcraft_logo_header_final.svg"
                             alt="Company Logo"
                             style="max-width:180px; display:block;">
                    </td>
                </tr>

                <!-- TITLE -->
                <tr>
                    <td style="color:#111827; font-size:22px; font-weight:bold; padding-bottom:10px;">
                        Hello {{ $user->name }},
                    </td>
                </tr>

                <!-- MESSAGE -->
                <tr>
                    <td style="color:#374151; font-size:14px; line-height:22px; padding-bottom:20px;">
                        Your account has been created successfully. Below are your login credentials:
                    </td>
                </tr>

                <!-- CREDENTIALS -->
                <tr>
                    <td>
                        <table width="100%" cellpadding="10" cellspacing="0"
                               style="background-color:#f9fafb; border-radius:6px;
                                      border:1px solid #e5e7eb;">

                            <tr>
                                <td width="120" style="font-size:14px; color:#374151; font-weight:bold;">
                                    Email
                                </td>
                                <td style="font-size:14px; color:#111827;">
                                    {{ $user->email }}
                                </td>
                            </tr>

                            <tr>
                                <td width="120" style="font-size:14px; color:#374151; font-weight:bold;">
                                    Password
                                </td>
                                <td style="font-size:14px; color:#111827;">
                                    {{ $password }}
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>

                <!-- NOTE -->
                <tr>
                    <td style="padding-top:20px; font-size:13px; color:#6b7280;">
                        For security reasons, please change your password after your first login.
                    </td>
                </tr>

                <!-- BUTTON -->
                <tr>
                    <td align="center" style="padding-top:30px;">
                        <a href="{{ url('/login') }}"
                           style="background-color:#4f46e5; color:#ffffff;
                                  text-decoration:none; font-size:14px;
                                  padding:12px 28px; border-radius:6px;
                                  display:inline-block; font-weight:bold;">
                            Login Now
                        </a>
                    </td>
                </tr>

                <!-- FOOTER -->
                <tr>
                    <td style="padding-top:35px; font-size:13px; color:#6b7280;">
                        Regards,<br>
                        <strong style="color:#111827;">{{ config('app.name') }}</strong>
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
