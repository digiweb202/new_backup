<?php
require 'vendor/autoload.php'; // Load PHPMailer

// Create a new PHPMailer instance
$mail = new PHPMailer\PHPMailer\PHPMailer();

// SMTP configuration (you might need to adjust these settings)
$mail->isSMTP();
$mail->Host = 'smtp.example.com';
$mail->SMTPAuth = true;
$mail->Username = 'your_username';
$mail->Password = 'your_password';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Sender and recipient information
$mail->setFrom('sender@example.com', 'Your Company');
$mail->addAddress('customer@example.com', 'Customer Name');

// Email subject and body
$mail->Subject = 'Your Invoice';
$mail->Body = '<h2>Invoice Details</h2><p>Please find your invoice attached.</p>';
$mail->IsHTML(true);

// Attach the PDF invoice
$pdfContent = // Generate your PDF content here
$mail->AddStringAttachment($pdfContent, 'invoice.pdf', 'base64', 'application/pdf');

// Company logo
$mail->AddEmbeddedImage('path_to_logo/logo.png', 'company_logo');

// Email content with embedded image
$mail->Body = '<h2>Invoice Details</h2><p>Please find your invoice attached.</p><img src="cid:company_logo">';

// Send the email
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}
?>