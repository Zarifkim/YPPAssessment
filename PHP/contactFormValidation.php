<?php
$respMsg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        $respMsg = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $respMsg = "Please enter a valid email address.";
    } else {
        $to = "Zarifkim@yahoo.com";
        $subject = "New Contact Form Submission";

        $emailContent = "Name: $name\n";
        $emailContent .= "Email: $email\n";
        $emailContent .= "Message: $message\n";

        $headers = "From: $email";

        if (mail($to, $subject, $emailContent, $headers)) {
            $respMsg = "Your message has been sent successfully!";
        } else {
            $respMsg = "There was an error sending your message. Please try again later.";
        }
    }
    echo $respMsg;
}
?>
