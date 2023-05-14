<?php 

namespace Model;

class Llibre extends ActiveRecord {
    protected static $taula = 'Llibres';
    protected static $columnesDB = ['id', 'nom', 'cognom', 'ciutat', 'pais', 'imatge', 'tags', 'social'];


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nom = $args['nom'] ?? '';
        $this->cognom = $args['cognom'] ?? '';
        $this->ciutat = $args['ciutat'] ?? '';
        $this->pais = $args['pais'] ?? '';
        $this->imatge = $args['imatge'] ?? '';
        $this->tags = $args['tags'] ?? '';
        $this->social = $args['social'] ?? '';
    }

    public function validar() {
        if(!$this->nom) {
            self::$alertes['error'][] = 'El nom és Obligatori';
        }
        if(!$this->cognom) {
            self::$alertes['error'][] = 'La descripció és Obligatòria';
        }
        if(!$this->ciutat) {
            self::$alertes['error'][] = 'El camp autor/a és Obligatori';
        }
        if(!$this->pais) {
            self::$alertes['error'][] = "L'any és Obligatori";
        }
        if(!$this->imatge) {
            self::$alertes['error'][] = "La imatge és Obligatòria";
        }
        if(!$this->tags) {
            self::$alertes['error'][] = 'Les temàtiques són obligatories';
        }
    
        return self::$alertes;
    }


}