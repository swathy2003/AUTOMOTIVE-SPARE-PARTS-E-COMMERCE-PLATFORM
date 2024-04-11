<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\vendor\autoload.php'; 

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data directly from the POST request
    $name = $_POST['name'];
    $email = $_POST['email'];
    $messageBody = $_POST['message'];

    // Create a PHPMailer object
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0; // Disable debugging (change to 2 for debugging)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'cse210swathy2003@gmail.com'; 
        $mail->Password = 'swathy2003'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('cse210swathy2003@gmail.com', $name); 
        $mail->addAddress('sekarswathy373@gmail.com', 'sekar'); 

        // Content
        $mail->isHTML(false); 
        $mail->Subject = 'Contact Form Submission';
        $mail->Body = "Name: $name\nEmail: $email\nMessage:\n$messageBody";

        $mail->send();
        $message = 'Email sent successfully';
    } catch (Exception $e) {
        $message = 'Email could not be sent. Error: ' . $mail->ErrorInfo;
    }
}

// Display Success Message
echo $message;
?>
