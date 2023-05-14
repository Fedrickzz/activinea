<?php

namespace Model;

class Dia extends ActiveRecord {
    protected static $taula = 'dias';
    protected static $columnesDB = ['id', 'nom'];

    public $id;
    public $nom;
}