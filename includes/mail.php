<?php
session_start();
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
include 'autoloader.php';
require 'conn.php';

try {
    loadEnv('../.env');
} catch (Exception $e) {
    die("Error loading .env file: " . $e->getMessage());
}

$userName = trim($_POST['uname'] ?? '');
$password = $_POST['pwd'] ?? '';
$userEmail = trim($_POST['mail'] ?? '');

$auth = new authentication($conn, $userName, $password, $userEmail);
$auth->getCheckEmail();

if ($auth->getCheckEmail()) {
    function sendMail($userEmail)
    {
        $code = rand(1111, 9999);
        $mail = new PHPMailer(true);

        if (isset($_POST['reg'])) {
            try {
                // Disable SMTP debug output in production to avoid header issues
                $mail->SMTPDebug = 0; // Set to SMTP::DEBUG_SERVER only for debugging
                $mail->isSMTP();
                $mail->Host = $_ENV['EMAILHOST'] ?? "";
                $mail->SMTPAuth = true;
                $mail->Username = $_ENV['EMAILUSERNAME'] ?? "";
                $mail->Password = $_ENV['EMAILPASSWORD'] ?? "";
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = $_ENV['EMAILPORT'] ?? "";

                // Recipients
                $mail->setFrom($_ENV['EMAILUSERNAME'], 'Oluwatimilehin');
                $mail->addAddress($userEmail);
                $mail->addReplyTo('no-reply@oluwatimilehintawose2005.com', "no-reply");

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Your One-Time Password';
                $mail->Body = "<!DOCTYPE html>
                    <html lang='en'>
                    <head>
                        <meta charset='UTF-8'>
                        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    </head>
                    <body style='margin: 0px; padding: 0px; font-family: sans-serif; background-color: #fe9900; color: #212B36; font-style: italic; font-weight: 300; height: auto'>
                        <br><br>
                        <div style='width: 260px; height: auto; background-color: #fff; padding: 30px; margin: auto;'>
                            <br><br>
                            <div style='margin-bottom: 20px;'>
                                <p style='font-size:14px;'>Your one-time password for premium is </p>
                                <p style='font-size:27px;'>$code</p>
                                <p style='font-size:14px; color:red;'>If you didn't request this code, please ignore this message</p>
                            </div>
                            <br><br>
                        </div><br><br>
                    </body>
                    </html>";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                $_SESSION['otp'] = $code;
                $_SESSION['email'] = $userEmail;
                $_SESSION['name'] = $_POST['uname'];
                $_SESSION['password'] = $_POST['pwd'];
                return true; // Indicate success
            } catch (Exception $e) {
                // Log the error instead of echoing to avoid output before header
                error_log("Mailer Error: {$mail->ErrorInfo}");
                return false; // Indicate failure
            }
        }
        return false; // Return false if $_POST['reg'] is not set
    }

    // Call sendMail and redirect based on its return value
    if (sendMail($userEmail)) {
        header("Location: ../otpVerification.php");
        exit; // Ensure no further code is executed after redirect
    } else {
        $_SESSION["error"] = "Failed to send OTP. Please try again.";
        header("Location: ../registration.php");
        exit;
    }
} else {
    $_SESSION["error"] = "Email already taken";
    header("Location: ../registration.php");
    exit;
}
