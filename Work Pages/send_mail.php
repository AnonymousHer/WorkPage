<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Replace with your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'damarcanq2121@gmail.com'; // Replace with your email
        $mail->Password = 'qqtt arty defo jcef'; // Replace with your email password or app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('damarcanq2121@gmail.com'); // Replace with the recipient's email

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "Name: $name<br>Email: $email<br>Message: $message";

        $mail->send();
        echo "<!DOCTYPE html>
              <html>
              <head>
                  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
              </head>
              <body>
                  <script>
                      document.addEventListener('DOMContentLoaded', function() {
                          Swal.fire({
                              title: 'Başarılı!',
                              text: 'Mesajınız başarıyla gönderildi!',
                              icon: 'success',
                              showConfirmButton: false,
                              timer: 2000,
                              timerProgressBar: true,
                              didOpen: () => {
                                  Swal.showLoading()
                              }
                          }).then((result) => {
                              window.location.href = 'index.html';
                          });
                      });
                  </script>
              </body>
              </html>";
    } catch (Exception $e) {
        echo "<!DOCTYPE html>
              <html>
              <head>
                  <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
              </head>
              <body>
                  <script>
                      document.addEventListener('DOMContentLoaded', function() {
                          Swal.fire({
                              title: 'Hata!',
                              text: 'Mesaj gönderilemedi: " . $mail->ErrorInfo . "',
                              icon: 'error',
                              showConfirmButton: true
                          }).then((result) => {
                              window.location.href = 'index.html';
                          });
                      });
                  </script>
              </body>
              </html>";
    }
}
?> 