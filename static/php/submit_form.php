<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    $to = "m.balcar@seznam.cz";
    $subject = "Stavby Polička - Kontaktní formulář";
    $headers = "From: $email";

    $body = "Jméno: $name\nE-mail: $email\nTelefon: $phone\nZpráva:\n$message";

    if(mail($to, $subject, $body, $headers)) {
        echo "Zpráva byla úspěšně odeslána.";
    } else {
        echo "Omlouváme se, došlo k chybě při odesílání zprávy.";
    }
}
?>