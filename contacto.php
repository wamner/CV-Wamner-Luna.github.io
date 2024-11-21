<header> <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script></header>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = htmlspecialchars($_POST['correo']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $asunto = htmlspecialchars($_POST['asunto']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Configuración de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Cambia esto por el servidor SMTP de tu proveedor
        $mail->SMTPAuth = true;
        $mail->Username = 'wamnerluna@gmail.com'; // Tu correo
        $mail->Password = 'mibb tjvx brkz iqce'; // Contraseña o token de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('wamnerluna@gmail.com', 'Wamner Sevilla Luna');
        $mail->addAddress('wamnerluna@gmail.com', 'Contacto CDP'); // Dirección del destinatario
        $mail->addReplyTo($correo, $nombre); // Permitir responder al correo enviado

        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body = "
            <h1>Nuevo mensaje de contacto</h1>
            <p><strong>Nombre:</strong> $nombre</p>
            <p><strong>Correo:</strong> $correo</p>
            <p><strong>Teléfono:</strong> $telefono</p>
            <p><strong>Mensaje:</strong> $mensaje</p>
        ";

  // Enviar el correo
        $mail->send();

        // SweetAlert2 para mensaje de éxito
     
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: '¡Correo enviado!',
                    text: 'Tu mensaje ha sido enviado exitosamente.',
                    confirmButtonText: 'Aceptar'
                }).then(() => {
                    window.location.href = 'index.html'; // Redirecciona al usuario después de cerrar la alerta
                });
              </script>";
    } catch (Exception $e) {
        // SweetAlert2 para mensaje de error
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error al enviar el correo',
                    text: 'Hubo un problema al enviar tu mensaje. Por favor, inténtalo de nuevo.',
                    footer: 'Detalles del error: {$mail->ErrorInfo}',
                    confirmButtonText: 'Aceptar'
                });
              </script>";
    }
}
?>