<?php

namespace Model;

class Usuari extends ActiveRecord {
    protected static $taula = 'usuaris';
    protected static $columnasDB = ['id', 'nom', 'cognom', 'email', 'pais', 'ciutat', 'telf', 'password', 'confirmacio', 'token', 'admin'];
    
    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nom = $args['nom'] ?? '';
        $this->cognom = $args['cognom'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->pais = $args['pais'] ?? '';
        $this->ciutat = $args['ciutat'] ?? '';
        $this->telf = $args['telf'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->confirmat = $args['confirmacio'] ?? 0;
        $this->token = $args['token'] ?? '';
        $this->admin = $args['admin'] ?? '';
    }

    // Validar el Login dels Usuaris
    public function validarLogin() {
        if(!$this->email) {
            self::$alertes['error'][] = 'El correu és Obligatori';
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertes['error'][] = 'Correu no vàlid';
        }
        if(!$this->password) {
            self::$alertes['error'][] = 'La contrasenya no pot ser buida';
        }
        return self::$alertes;

    }

    // Validació per comptes noves
    public function validar_compte() {
        if(!$this->nom) {
            self::$alertes['error'][] = 'El nom es Obligatori';
        }
        if(!$this->cognom) {
            self::$alertes['error'][] = 'El cognom és Obligatori';
        }
        if(!$this->email) {
            self::$alertes['error'][] = 'El correu és Obligatori';
        }
        if(!$this->password) {
            self::$alertes['error'][] = 'La contrasenya no pot ser buida';
        }
        if(strlen($this->password) < 6) {
            self::$alertes['error'][] = 'La contrasenya ha de contenir almenys 6 caràcters';
        }
        if($this->password !== $this->password2) {
            self::$alertes['error'][] = 'Les contrasenyes no són iguals';
        }
        return self::$alertes;
    }

    // Valida un email
    public function validarEmail() {
        if(!$this->email) {
            self::$alertes['error'][] = 'El correu és Obligatori';
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertes['error'][] = 'Email no vàlid';
        }
        return self::$alertes;
    }

    // Valida el Password 
    public function validarPassword() {
        if(!$this->password) {
            self::$alertes['error'][] = 'La contrasenya no pot ser buida';
        }
        if(strlen($this->password) < 6) {
            self::$alertes['error'][] = 'La contrasenya ha de contenir almenys 6 caràcters';
        }
        return self::$alertes;
    }

    public function nuevo_password() : array {
        if(!$this->password_actual) {
            self::$alertes['error'][] = 'La contrasenya Actual no pot ser buida';
        }
        if(!$this->password_nuevo) {
            self::$alertes['error'][] = 'La contrasenya Nova no pot ser buida';
        }
        if(strlen($this->password_nuevo) < 6) {
            self::$alertes['error'][] = 'La contrasenya ha de contenir almenys 6 caràcters';
        }
        return self::$alertes;
    }

    // Comprovar el password
    public function comprovar_password() : bool {
        return password_verify($this->password_actual, $this->password );
    }

    // Generar hash del password
    public function hashPassword() : void {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    // Generar un Token
    public function crearToken() : void {
        $this->token = uniqid();
    }
}