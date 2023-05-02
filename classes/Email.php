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
         $mail->Subject = 'Confirma la compta';

         // Set HTML
         $mail->isHTML(TRUE);
         $mail->CharSet = 'UTF-8';

         $contingut = '<html>';
         $contingut .= "<p><strong>Hola " . $this->nom .  "</strong> Has Registrat Correctament la teva compte en Activinea; però és necessari confirmar-la</p>";
         $contingut .= "<p>Prem aquí: <a href='" . $_ENV['HOST'] . "/confirmar-compte?token=" . $this->token . "'>Confirmar Compte</a>";       
         $contingut .= "<p>Si tu no has creat aquesta compta; pots ignorar el missatge</p>";
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
    
        $mail->setFrom('ompte@activinea.com');
        $mail->addAddress($this->email, $this->nom);
        $mail->Subject = 'Reestableix la teva contrasenya';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contingut = '<html>';
        $contingut .= "<p><strong>Hola " . $this->nom .  "</strong> Has solicitat reestablir la teva contrasenya, seguiex el següent enllaç.</p>";
        $contingut .= "<p>Prem aquí: <a href='" . $_ENV['HOST'] . "/reestablir?token=" . $this->token . "'>Reestablir Contrasenya</a>";        
        $contingut .= "<p>Si tu no sol·licitat aquest canvi, pots ignorar el missatge</p>";
        $contingut .= '</html>';
        $mail->Body = $contingut;

        //Enviar el mail
        $mail->send();
    }
}