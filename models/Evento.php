<?php

namespace Model;

class Evento extends ActiveRecord {
    protected static $taula = 'eventos';
    protected static $columnesDB = ['id', 'nombre', 'descripcion', 'disponibles', 'categoria_id', 'dia_id', 'hora_id', 'ponente_id'];

    public $id;
    public $nombre;
    public $descripcion;
    public $disponibles;
    public $categoria_id;
    public $dia_id;
    public $hora_id;
    public $ponente_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->disponibles = $args['disponibles'] ?? '';
        $this->categoria_id = $args['categoria_id'] ?? '';
        $this->dia_id = $args['dia_id'] ?? '';
        $this->hora_id = $args['hora_id'] ?? '';
        $this->ponente_id = $args['ponente_id'] ?? '';
    }

    // Mensajes de validación para la creación de un evento
    public function validar() {
        if(!$this->nombre) {
            self::$alertes['error'][] = 'El Nom és Obligatori';
        }
        if(!$this->descripcion) {
            self::$alertes['error'][] = 'La descripció és Obligaòria';
        }
        if(!$this->categoria_id  || !filter_var($this->categoria_id, FILTER_VALIDATE_INT)) {
            self::$alertes['error'][] = 'Tria una Categoria';
        }
        if(!$this->dia_id  || !filter_var($this->dia_id, FILTER_VALIDATE_INT)) {
            self::$alertes['error'][] = 'Tria el Dia de la presentació';
        }
        if(!$this->hora_id  || !filter_var($this->hora_id, FILTER_VALIDATE_INT)) {
            self::$alertes['error'][] = 'Tria la hora de la presentació';
        }
        if(!$this->disponibles  || !filter_var($this->disponibles, FILTER_VALIDATE_INT)) {
            self::$alertes['error'][] = 'Afageix una quantitat de llocs disponibles';
        }
        if(!$this->ponente_id || !filter_var($this->ponente_id, FILTER_VALIDATE_INT) ) {
            self::$alertes['error'][] = 'Selecciona la persona encarregada de la presentació';
        }

        return self::$alertes;
    }
}