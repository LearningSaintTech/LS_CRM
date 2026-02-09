<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Scheduled</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f7f9fc;
            color: #333333;
            line-height: 1.6;
            padding: 20px 0;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .header {
            background: linear-gradient(135deg, #4f6df5 0%, #3a56e4 100%);
            color: white;
            padding: 30px 40px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 28px;
            margin-bottom: 8px;
            font-weight: 700;
        }
        
        .header p {
            opacity: 0.9;
            font-size: 16px;
        }
        
        .content {
            padding: 40px;
        }
        
        .greeting {
            font-size: 18px;
            margin-bottom: 25px;
            color: #444444;
        }
        
        .info-card {
            background-color: #f8fafd;
            border-radius: 10px;
            padding: 25px;
            margin: 25px 0;
            border-left: 4px solid #4f6df5;
        }
        
        .info-row {
            display: flex;
            margin-bottom: 18px;
            align-items: flex-start;
        }
        
        .info-row:last-child {
            margin-bottom: 0;
        }
        
        .info-label {
            font-weight: 600;
            color: #4f6df5;
            min-width: 90px;
            font-size: 15px;
        }
        
        .info-value {
            color: #333333;
            font-size: 16px;
            flex: 1;
        }
        
        .zoom-card {
            background: linear-gradient(to right, #f0f5ff, #f9fbff);
            border-radius: 10px;
            padding: 25px;
            margin: 30px 0;
            text-align: center;
            border: 1px solid #e6efff;
        }
        
        .zoom-card h3 {
            color: #4f6df5;
            margin-bottom: 15px;
            font-size: 20px;
        }
        
        .zoom-link {
            display: inline-block;
            background: linear-gradient(135deg, #4f6df5 0%, #3a56e4 100%);
            color: white;
            text-decoration: none;
            padding: 14px 30px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            margin: 15px 0;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(79, 109, 245, 0.3);
        }
        
        .zoom-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(79, 109, 245, 0.4);
        }
        
        .zoom-note {
            font-size: 14px;
            color: #666666;
            margin-top: 10px;
        }
        
        .calendar-reminder {
            background-color: #fff9f0;
            border-radius: 10px;
            padding: 20px;
            margin: 25px 0;
            display: flex;
            align-items: center;
            border: 1px solid #ffeccc;
        }
        
        .calendar-icon {
            background-color: #ffa726;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
            font-size: 20px;
        }
        
        .calendar-text {
            font-size: 15px;
            color: #333333;
        }
        
        .footer {
            text-align: center;
            padding: 30px 40px;
            background-color: #f8fafd;
            color: #666666;
            font-size: 14px;
            border-top: 1px solid #eef2f7;
        }
        
        .signature {
            margin-top: 25px;
            font-weight: 600;
            color: #444444;
        }
        
        @media (max-width: 600px) {
            .content, .header {
                padding: 25px;
            }
            
            .header h1 {
                font-size: 24px;
            }
            
            .info-row {
                flex-direction: column;
            }
            
            .info-label {
                margin-bottom: 5px;
            }
            
            .calendar-reminder {
                flex-direction: column;
                text-align: center;
            }
            
            .calendar-icon {
                margin-right: 0;
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Meeting Scheduled</h1>
            <p>You have a new upcoming meeting</p>
        </div>
        
        <div class="content">
            <p class="greeting">Hello <strong>{{ $vendorUser->name }}</strong>,</p>
            
            <p>A meeting has been scheduled with you. Below are the meeting details:</p>
            
            <div class="info-card">
                <div class="info-row">
                    <span class="info-label">Date:</span>
                    <span class="info-value">{{ $meeting->meetingDate }}</span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Course:</span>
                    <span class="info-value">{{ $meeting->course }}</span>
                </div>
            </div>
            
            <div class="zoom-card">
                <h3>Join via Zoom</h3>
                <p>Click the button below to join the meeting at the scheduled time:</p>
                <a href="{{ $meeting->meetingLink }}" class="zoom-link">Join Meeting</a>
                <p class="zoom-note">If the button doesn't work, copy and paste this link in your browser:<br>
                <span style="font-size: 12px; word-break: break-all;">{{ $meeting->meetingLink }}</span></p>
            </div>
            
            <div class="calendar-reminder">
                <div class="calendar-icon">
                    📅
                </div>
                <div class="calendar-text">
                    <strong>Don't forget to add this meeting to your calendar</strong><br>
                    We recommend setting a reminder 10 minutes before the meeting starts.
                </div>
            </div>
            
            <p>If you have any questions or need to reschedule, please contact us as soon as possible.</p>
        </div>
        
        <div class="footer">
            <p>Thank you,<br>
            <span class="signature">The Team</span></p>
            <p style="margin-top: 15px; font-size: 13px; color: #888;">This is an automated notification. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>