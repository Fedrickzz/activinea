<?php 

namespace Model;

class Punts extends Middleware {
    protected static $taula = 'Punts';
    protected static $columnesDB = ['id', 'id_usuari','nom', 'cognom', 'dia', 'temps', 'punts'];


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->id_usuari = $args['id_usuari'] ?? '';
        $this->nom = $args['nom'] ?? '';
        $this->cognom = $args['cognom'] ?? '';
        $this->dia = $args['dia'] ?? '';
        $this->temps = $args['temps'] ?? '';
        $this->punts = $args['punts'] ?? '';
    }

}