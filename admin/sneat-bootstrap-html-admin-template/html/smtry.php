<?php 

ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", "587");
ini_set("sendmail_from", "admin@gmail.com");


$adminEmail = 'shahhit15@gmail.com'; // Replace with your admin's email address
  $subject = 'New Order Received';
  $message = 'A new order has been received:'
    . "\nProduct Name: "
    . "\nQuantity: " 
    . "\nCustomer Name: "
    . "\nPlease check the admin panel for details.";

  $headers = 'From: your_email@example.com' . "\r\n" .
             'Reply-To: your_email@example.com' . "\r\n" .
             'X-Mailer: PHP/' . phpversion();

  if (mail($adminEmail, $subject, $message, $headers)) {
    echo 'Order received successfully. Notification sent to admin.';
  } else {
    echo 'Order received successfully, but notification email could not be sent.';
  }

?>