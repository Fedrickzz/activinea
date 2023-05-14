<?php

namespace Model;

class Hora extends ActiveRecord {
    protected static $taula = 'hores';
    protected static $columnesDB = ['id', 'hora'];

    public $id;
    public $hora;
}