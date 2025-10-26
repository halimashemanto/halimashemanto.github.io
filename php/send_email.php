<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if ( empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please fill in all fields correctly!";
        exit;
    }

    $to = "suprovashemanto@gmail.com"; // <-- Tumor mail
    $subject = "New Contact Form Message from $name";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message\n";
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    if(mail($to, $subject, $body, $headers)) {
        echo "<p style='color:green; text-align:center; margin-top:20px;'>Message sent successfully!</p>";
    } else {
        echo "<p style='color:red; text-align:center; margin-top:20px;'>Oops! Something went wrong. Please try again.</p>";
    }

} else {
    echo "<p style='color:red; text-align:center; margin-top:20px;'>Invalid request.</p>";
}
?>
