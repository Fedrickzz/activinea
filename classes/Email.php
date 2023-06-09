<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nom;
    public $token;
    
    public function __construct($email, $nom, $token)
    {
        $this->email = $email;
        $this->nom = $nom;
        $this->token = $token;
    }

    public function enviarConfirmacio() {

         // create a new object
         $mail = new PHPMailer();
         $mail->isSMTP();
         $mail->Host = $_ENV['EMAIL_HOST'];
         $mail->SMTPAuth = true;
         $mail->Port = $_ENV['EMAIL_PORT'];
         $mail->Username = $_ENV['EMAIL_USER'];
         $mail->Password = $_ENV['EMAIL_PASS'];
     
         $mail->setFrom('compte@activinea.com');
         $mail->addAddress($this->email, $this->nom);
         $mail->Subject = 'Confirma el compte';

         // Set HTML
         $mail->isHTML(TRUE);
         $mail->CharSet = 'UTF-8';

         $contingut = '<html>';
         $contingut .= "<p><strong>Hola " . $this->nom .  "</strong> Has registrat correctament el teu compte a Activinea, però és necessari confirmar-la:</p>";
         $contingut .= "<p>Prem aquí: <a href='" . $_ENV['HOST'] . "/confirmar-compte?token=" . $this->token . "'>Confirmar Compte</a>";       
         $contingut .= "<p>Si tu no has creat aquest compte, pots ignorar el missatge.</p>";
         $contingut .= '</html>';
         $mail->Body = $contingut;

         //Enviar el mail
         $mail->send();

    }

    public function enviarInstruccions() {

        // create a new object
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
    
        $mail->setFrom('compte@activinea.com');
        $mail->addAddress($this->email, $this->nom);
        $mail->Subject = 'Restableix la teva contrasenya';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contingut = '<html>';
        $contingut .= "<p><strong>Hola " . $this->nom .  "</strong> Has solicitat restablir la teva contrasenya, seguiex el següent enllaç.</p>";
        $contingut .= "<p>Prem aquí: <a href='" . $_ENV['HOST'] . "/restablir?token=" . $this->token . "'>Restablir Contrasenya</a>";        
        $contingut .= "<p>Si tu no sol·licitat aquest canvi, pots ignorar el missatge</p>";
        $contingut .= '</html>';
        $mail->Body = $contingut;

        //Enviar el mail
        $mail->send();
    }
}