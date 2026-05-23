<?php
// functions/helper.php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendVerificationEmail(string $toEmail, string $toName, string $token): bool
{
    $mail = new PHPMailer(true);

    try {
        // Enable full debug output
        $mail->Debugoutput = function ($str, $level) {
            echo "<pre>[$level] $str</pre>";
        };

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'davidosas011@gmail.com'; // ← your real Gmail
        $mail->Password   = 'hfzq jxmj rumd tsvw';     // ← your App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('davidosas011S@gmail.com', 'School Management');
        $mail->addAddress($toEmail, $toName);

        $verifyLink = "http://localhost/SMS/school-management/auth/verify.php?token=" . $token;

        $mail->isHTML(true);
        $mail->Subject = 'Verify your email';
        $mail->Body    = "<p>Hi {$toName}, <a href='{$verifyLink}'>click here to verify</a></p>";
        $mail->AltBody = "Verify here: {$verifyLink}";

        $mail->send();
        echo "<pre>Email sent successfully to {$toEmail}</pre>";
        return true;
    } catch (Exception $e) {
        echo "<pre>FAILED: " . $mail->ErrorInfo . "</pre>";
        return false;
    }
}
