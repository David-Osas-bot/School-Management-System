<?php
// functions/helper.php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ↓ THIS IS WHAT WAS MISSING
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

function sendVerificationEmail(string $toEmail, string $toName, string $token): bool
{
  $mail = new PHPMailer(true);

  try {
    $mail->isSMTP();
    $mail->Host       = $_ENV['SMTP_HOST'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $_ENV['SMTP_USERNAME'];
    $mail->Password   = $_ENV['SMTP_PASSWORD']; // ← put your new App Password here
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom($_ENV['SMTP_USERNAME'], 'School Management');
    $mail->addAddress($toEmail, $toName);

    $verifyLink = $_ENV['APP_URL'] . $token;

    $mail->isHTML(true);
    $mail->Subject = 'Schoolify: Verify your email';
    $mail->Body    = '
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin:0;padding:0;background-color:#f4f6f9;font-family:Arial,sans-serif;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f9;padding:40px 0;">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:12px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,0.08);">

          <tr>
            <td style="background:#4f46e5;padding:36px 40px;text-align:center;">
              <h1 style="margin:0;color:#ffffff;font-size:24px;font-weight:700;letter-spacing:0.5px;">Schoolify</h1><br/>
              <h1 style="margin:0;color:#ffffff;font-size:24px;font-weight:500;letter-spacing:0.5px;">School Management</h1>
              <p style="margin:6px 0 0;color:#c7d2fe;font-size:14px;">Email Verification</p>
            </td>
          </tr>

          <tr>
            <td style="padding:40px;">
              <h2 style="margin:0 0 12px;color:#1e1b4b;font-size:20px;">Hi ' . $toName . ',</h2>
              <p style="margin:0 0 20px;color:#4b5563;font-size:15px;line-height:1.7;">
                Thanks for registering! Please verify your email address to activate your account and get started.
              </p>

              <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td align="center" style="padding:10px 0 30px;">
                    <a href="' . $verifyLink . '"
                       style="display:inline-block;background:#4f46e5;color:#ffffff;text-decoration:none;
                              font-size:15px;font-weight:600;padding:14px 36px;border-radius:8px;">
                      Verify my email
                    </a>
                  </td>
                </tr>
              </table>

              <p style="margin:0 0 8px;color:#6b7280;font-size:13px;line-height:1.6;">
                If the button does not work, copy and paste this link into your browser:
              </p>
              <p style="margin:0 0 24px;word-break:break-all;">
                <a href="' . $verifyLink . '" style="color:#4f46e5;font-size:13px;">' . $verifyLink . '</a>
              </p>

              <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="background:#fef3c7;border-left:4px solid #f59e0b;border-radius:6px;padding:14px 16px;">
                    <p style="margin:0;color:#92400e;font-size:13px;line-height:1.6;">
                      This link expires in <strong>24 hours</strong>.
                      If you did not create an account, you can safely ignore this email.
                    </p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <tr>
            <td style="background:#f9fafb;border-top:1px solid #e5e7eb;padding:24px 40px;text-align:center;">
              <p style="margin:0;color:#9ca3af;font-size:12px;line-height:1.6;">
                &copy; 2026 School Management System. All rights reserved.<br>
                This is an automated email, please do not reply.
              </p>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>';

    $mail->AltBody = "Hi {$toName}, verify your account here: {$verifyLink} (link expires in 24 hours)";

    $mail->send();
    return true;
  } catch (Exception $e) {
    error_log("Mailer Error: " . $mail->ErrorInfo);
    echo "<pre style='color:red;background:#fff;padding:10px;'>";
    echo "SMTP Error: " . $mail->ErrorInfo . "<br>";
    echo "Exception: " . $e->getMessage();
    echo "</pre>";
    return false;
  }
}
