<?php

namespace Controllers;

use Classes\Email;
use Model\Usuari;
use MVC\Router;

class AuthController {
    public static function home(Router $router) {
      echo 'Des de home';  
    }
    public static function login(Router $router) {

        $alertes = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            $usuari = new Usuari($_POST);

            $alertes = $usuari->validarLogin();
            
            if(empty($alertes)) {
                // Verificar que l'usuari existeix
                $usuari = Usuari::where('email', $usuari->email);
                if(!$usuari || !$usuari->confirmat ) {
                    Usuari::setAlerta('error', "L'suari No Existeix o no esta confirmat");
                } else {
                    // L'Usuari existeix
                    if( password_verify($_POST['password'], $usuari->password) ) {
                        
                        // Iniciar la sesión
                        session_start();    
                        $_SESSION['id'] = $usuari->id;
                        $_SESSION['nom'] = $usuari->nom;
                        $_SESSION['cognom'] = $usuari->cognom;
                        $_SESSION['email'] = $usuari->email;
                        $_SESSION['admin'] = $usuari->admin ?? null;
                        
                    } else {
                        Usuari::setAlerta('error', 'Contrasenya Incorrecta');
                    }
                }
            }
        }

        $alertes = Usuari::getAlertes();
        
        // Renderitzar la vista 
        $router->render('auth/login', [
            'titol' => 'Iniciar Sessió',
            'alertes' => $alertes
        ]);
    }

    public static function logout() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION = [];
            header('Location: /');
        }
       
    }

    public static function registre(Router $router) {
        $alertes = [];
        $usuari = new Usuari;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuari->sincronitzar($_POST);
            
            $alertes = $usuari->validar_compte();

            if(empty($alertes)) {
                $existeUsuari = Usuari::where('email', $usuari->email);

                if($existeUsuari) {
                    Usuari::setAlerta('error', "L'usuari ja està registrat");
                    $alertes = Usuari::getAlertes();
                } else {
                    // Generar hash del password
                    $usuari->hashPassword();

                    // Eliminar password2
                    unset($usuari->password2);

                    // Generar el Token
                    $usuari->crearToken();

                    // Crear un nou usuari
                    $resultat =  $usuari->guardar();

                    // Enviar email
                    $email = new Email($usuari->email, $usuari->nom, $usuari->token);
                    $email->enviarConfirmacio();
                    

                    if($resultat) {
                        header('Location: /missatge');
                    }
                }
            }
        }

        // Render a la vista
        $router->render('auth/registre', [
            'titol' => 'Crea la teva compte',
            'usuari' => $usuari, 
            'alertes' => $alertes
        ]);
    }

    public static function oblidada(Router $router) {
        $alertes = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuari = new Usuari($_POST);
            $alertes = $usuari->validarEmail();

            if(empty($alertes)) {
                // Buscar el usuari
                $usuari = Usuari::where('email', $usuari->email);

                if($usuari && $usuari->confirmat) {

                    // Generar un nou token
                    $usuari->crearToken();
                    unset($usuari->password2);

                    // Actualizar l'usuari
                    $usuari->guardar();

                    // Enviar el email
                    $email = new Email( $usuari->email, $usuari->nom, $usuari->token );
                    $email->enviarInstruccions();


                    // Imprimir la alerta
                    // Usuari::setAlerta('exit', 'Hemos enviado las instrucciones a tu email');

                    $alertes['exit'][] = 'Hem enviat les instruccions al teu email';
                } else {
                 
                    // Usuari::setAlerta('error', 'El Usuari no existe o no esta confirmat');

                    $alertes['error'][] = "L'Usuari no existeix o no està confirmat";
                }
            }
        }

        // Muestra la vista
        $router->render('auth/oblidada', [
            'titol' => 'Contrasenya Oblidada',
            'alertes' => $alertes
        ]);
    }

    public static function reestablir(Router $router) {

        $token = s($_GET['token']);

        $token_valido = true;

        if(!$token) header('Location: /');

        // Identificar l'usuari con este token
        $usuari = Usuari::where('token', $token);

        if(empty($usuari)) {
            Usuari::setAlerta('error', 'Token No Vàlid, intenta de nou');
            $token_valido = false;
        }


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Afegir la nova contrasenya
            $usuari->sincronizar($_POST);

            // Validar contrasenya
            $alertes = $usuari->validarPassword();

            if(empty($alertes)) {
                // Generar la nova password
                $usuari->hashPassword();

                // Eliminar el Token
                $usuari->token = null;

                // Guardar el usuari en la BD
                $resultat = $usuari->guardar();

                // Redireccionar
                if($resultat) {
                    header('Location: /');
                }
            }
        }

        $alertes = Usuari::getAlertes();
        
        // Renderitzar la vista
        $router->render('auth/reestablir', [
            'titol' => 'Reestablir Contrasenya',
            'alertes' => $alertes,
            'token_valid' => $token_valid
        ]);
    }

    public static function missatge(Router $router) {

        $router->render('auth/missatge', [
            'titol' => 'Compte Creada exitosament'
        ]);
    }

    public static function confirmar(Router $router) {
        
        $token = s($_GET['token']);

        if(!$token) header('Location: /');

        // Buscar l'usuari amb aquest token
        $usuari = Usuari::where('token', $token);

        if(empty($usuari)) {
            // No s'ha trobat cap usuari amb aquest token
            Usuari::setAlerta('error', 'Token No Vàlid');
        } else {
            // Confirmar la compte
            $usuari->confirmat = 1;
            $usuari->token = '';
            unset($usuari->password2);
            
            // Guardar en la BD
            $usuari->guardar();

            Usuari::setAlerta('exit', 'Cuenta Comprobada Correctament');
        }

        $router->render('auth/confirmar', [
            'titol' => 'Confirmar la compte Activinea',
            'alertes' => Usuari::getAlertes()
        ]);
    }
}