<?php

namespace Controllers;

use Classes\Email;
use Model\Usuari;
use MVC\Router;

class AuthController {

    public static function login(Router $router) {

        $alertes = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            $usuari = new Usuari($_POST);

            $alertes = $usuari->validarLogin();
            
            if(empty($alertes)) {
                // Verificar que l'usuari existeix
                $usuari = Usuari::where('email', $usuari->email);
                if(!$usuari || !$usuari->confirmacio ) {
                    Usuari::setAlerta('error', "L'usuari No Existeix o no esta confirmat");
                } else {
                    // L'Usuari existeix
                    if (password_verify($_POST['password'], $usuari->password)) {
                        
                        // Iniciar la sessió
                        session_start();    
                        $_SESSION['id'] = $usuari->id;
                        $_SESSION['nom'] = $usuari->nom;
                        $_SESSION['cognom'] = $usuari->cognom;
                        $_SESSION['email'] = $usuari->email;
                        $_SESSION['admin'] = $usuari->admin ?? null;

                        // Redireccióif ()
                        if ($usuari->admin){
                            header('Location: /user/dashboard');
                        } else {
                            header('Location: /finalitzar-registre');
                        }
                        
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
                $existeixUsuari = Usuari::where('email', $usuari->email);
                

                if($existeixUsuari) {
                    Usuari::setAlerta('error', "L'usuari ja està registrat");
                    $alertes = Usuari::getAlertes();
                } else if ($existeixUsuari == NULL) {

                    // Generar hash del password
                    $usuari->hashPassword();

                    // Eliminar password2
                    unset($usuari->password2);

                    // Generar el Token
                    $usuari->crearToken();

                    // Crear un nou usuari
                    $resultat = $usuari->guardar();

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
            'titol' => 'Crea el teu compte',
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

                if($usuari && $usuari->confirmacio) {

                    // Generar un nou token
                    $usuari->crearToken();
                    unset($usuari->password2);

                    // Actualitzar l'usuari
                    $usuari->guardar();

                    // Enviar el email
                    $email = new Email( $usuari->email, $usuari->nom, $usuari->token );
                    $email->enviarInstruccions();


                    $alertes['success'][] = 'Hem enviat les instruccions al teu email';
                } else {

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

    public static function restablir(Router $router) {

        $token = s($_GET['token']);

        $token_valid = true;

        if(!$token) header('Location: /');

        // Identificar l'usuari con este token
        $usuari = Usuari::where('token', $token);

        if(empty($usuari)) {
            Usuari::setAlerta('error', 'Token No Vàlid, intenta de nou');
            $token_valid = false;
        }


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Afegir la nova contrasenya
            $usuari->sincronitzar($_POST);

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
                    header('Location: /login');
                }
            }
        }

        $alertes = Usuari::getAlertes();
        
        // Renderitzar la vista
        $router->render('auth/restablir', [
            'titol' => 'Restablir Contrasenya',
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
            // Confirmar el compte
            $usuari->confirmacio = 1;
            $usuari->token = '';
            unset($usuari->password2);
            
            // Guardar en la BD
            $usuari->guardar();

            Usuari::setAlerta('success', 'Compte Confirmat Correctament');
        }

        $router->render('auth/confirmar', [
            'titol' => 'Confirmar el compte',
            'alertes' => Usuari::getAlertes()
        ]);
    }
}