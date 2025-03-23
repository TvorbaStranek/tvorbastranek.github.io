<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ošetření vstupů proti XSS a prázdným hodnotám
    $name = htmlspecialchars(trim($_POST["name"] ?? ""));
    $email = filter_var(trim($_POST["email"] ?? ""), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST["telefon"] ?? ""));
    $message = htmlspecialchars(trim($_POST["zprava"] ?? ""));

    // Validace e-mailu
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Neplatná e-mailová adresa.");
    }

    // Příjemce
    $to = "danielbalcar22@gmail.com";
    $subject = "Kontaktní formulář";

    // Hlavičky
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Tělo e-mailu
    $body = "Jméno: $name\n";
    $body .= "E-mail: $email\n";
    $body .= "Telefon: $phone\n\n";
    $body .= "Zpráva:\n$message\n";

    // Odeslání e-mailu
    if (mail($to, $subject, $body, $headers)) {
        echo "Zpráva byla úspěšně odeslána.";
    } else {
        echo "Omlouváme se, došlo k chybě při odesílání zprávy.";
    }
}
?>
