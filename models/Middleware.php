<?php
namespace Model;
class Middleware {

    // Base de dades
    protected static $db;
    protected static $taula = '';
    protected static $columnesDB = [];

    // Alertes i missatges
    protected static $alertes = [];
    
    // Definir la connexió a la BD - includes/database.php
    public static function setDB($database) {
        self::$db = $database;
    }

    // Definir un tipus d'alerta
    public static function setAlerta($tipu, $missatge) {
        static::$alertes[$tipu][] = $missatge;
    }

    // Obtenir les alertes
    public static function getAlertes() {
        return static::$alertes;
    }

    // Validació que s'hereda en els models
    public function validar() {
        static::$alertes = [];
        return static::$alertes;
    }

    // Consulta SQL per crear un objecte en memòria
    public static function consultarSQL($query) {

        // Consultar la base de dades
        $resultat = self::$db->query($query);

        // Iterar els resultats
        $array = [];
        while($registre = $resultat->fetch_assoc()) {
            $array[] = static::crearObjecte($registre);
        }

        // Alliberar la memòria
        $resultat->free();

        // retornar els resultats
        return $array;
    }

    // Crea l'objecte en memòria que es igual al de la BD
    protected static function crearObjecte($registre) {
        $objecte = new static;

        foreach($registre as $key => $value ) {
            if(property_exists( $objecte, $key  )) {
                $objecte->$key = $value;
            }
        }
        return $objecte;
    }

    // Identificar i unir els atributs de la BD
    public function atributs() {
        $atributs = [];
        foreach(static::$columnesDB as $columna) {
            if ($columna === 'id') continue;
            $atributs[$columna] = $this->$columna;
        }

        return $atributs;
    }

    // Sanititzar les dades abans de guardar-les en la BD
    public function sanititzarAtributs() {
        $atributs = $this->atributs();
        $sanititzat = [];
        foreach($atributs as $key => $value ) {
            $sanititzat[$key] = self::$db->escape_string($value);
        }
        return $sanititzat;
    }

    // Sincroniza BD amb Objetes en memòria
    public function sincronitzar($args=[]) { 
        foreach($args as $key => $value) {
          if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
          }
        }
    }

    // registres - CRUD
    public function guardar() {
        $resultat = '';

        if(!is_null($this->id)) {
            // actualitzar
            $resultat = $this->actualitzar();

        } else {
            // Crear un nou registre
            $resultat = $this->crear();
        }


        return $resultat;
    }

    // Obtenir tots els registres
    public static function all() {
        $query = "SELECT * FROM " . static::$taula . " ORDER BY id DESC";
        $resultat = self::consultarSQL($query);
        return $resultat;
    }

    // Busca un registre per id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$taula  ." WHERE id = ${id}";
        $resultat = self::consultarSQL($query);
        return array_shift( $resultat ) ;
    }

    // Obtenir registres amb certa quantitat
    public static function get($limit) {
        $query = "SELECT * FROM " . static::$taula . " LIMIT ${limit} ORDER BY id DESC" ;
        $resultat = self::consultarSQL($query);
        return array_shift( $resultat ) ;
    }

    // Paginar els registres
    public static function paginar($per_pagina, $offset) {
        $query = "SELECT * FROM " . static::$taula . " ORDER BY id DESC LIMIT ${per_pagina} OFFSET ${offset} " ;
        $resultat = self::consultarSQL($query);
        return $resultat;
    }

    // Buscar Where amb Columna 
    public static function where($columna, $valor) {
        $query = "SELECT * FROM " . static::$taula . " WHERE ${columna} = '${valor}'";
        $resultat = self::consultarSQL($query);
        return array_shift( $resultat ) ;
    }

    // Retornar els registres ordenats
    public static function ordenar($columna, $ordre) {
        $query = "SELECT * FROM " . static::$taula . " ORDER BY ${columna} ${ordre} "; 
        $resultat = self::consultarSQL($query);
        return $resultat;
    }
    // Retornar amb ordre i limit
    public static function ordenarLimit($columna, $ordre, $limit) {
        $query = "SELECT * FROM " . static::$taula . " ORDER BY ${columna} ${ordre} LIMIT ${limit} "; 
        $resultat = self::consultarSQL($query);
        return $resultat;
    }

    // Búsqueda Where amb Múltiples opcions
    public static function whereArray($array = []) {
        $query = "SELECT * FROM " . static::$taula . " WHERE ";
        foreach($array as $key => $value) {
            if($key == array_key_last($array)) {
                $query .= " ${key} = '${value}'";
            } else {
                $query .= " ${key} = '${value}' AND ";
            }
        }
        $resultat = self::consultarSQL($query);
        return $resultat;
    }

    // Tornar un total dels registres
    public static function total($columna = '', $valor = '') {
        $query = "SELECT COUNT(*) FROM " . static::$taula;
        if($columna) {
            $query .= " WHERE ${columna} = ${valor}";
        }
        $resultat = self::$db->query($query);
        $total = $resultat->fetch_array();

        return array_shift($total);
    }

    // Total de Registres amb un Array Where
    public static function totalArray($array = []) {
        $query = "SELECT COUNT(*) FROM " . static::$taula . " WHERE ";
        foreach($array as $key => $value) {
            if($key == array_key_last($array)) {
                $query .= " ${key} = '${value}' ";
            } else {
                $query .= " ${key} = '${value}' AND ";
            }
        }
        $resultat = self::$db->query($query);
        $total = $resultat->fetch_array();
        return array_shift($total);
    }   

    // Creau un nou registre
    public function crear() {
        // Sanititzar les dades
        $atributs = $this->sanititzarAtributs();

        // Insertar en la base de dades
        $query = "INSERT INTO " . static::$taula . " (";
        $query .= join(', ', array_keys($atributs));
        $query .= ") VALUES ('"; 
        $query .= join("', '", array_values($atributs));
        $query .= "')";

        // Resultat de la consulta
        $resultat = self::$db->query($query);

        // ***************************

        // // Insertar en la base de dades
        // $query = "INSERT INTO " . static::$taula . " (";
        // $query .= join(', ', array_keys($atributs));
        // $query .= ") VALUES ("; 

        // $lenght = count($atributs);
        // $counter = array_fill(0,$lenght,'?');

        // // emplenar amb ?
        // // exemple: "INSERT INTO Usuaris (nom, cognom, email) VALUES (?, ?, ?)"
        // $query .= join(", ", array_values($counter));
        // $query .= ")";

        // $counter_2 = array_fill(0,$lenght,'s');
        // $query_2 = join("", array_values($counter_2));
        // $query_3 = '"'.$query_2 .'"';

        // // exemple: ("sss", $nom, $cognom, $email)
        // $query_4 = $query_3 . ', "'.join('", "', array_values($atributs)) . '"';
        
        // $stmt = self::$db->prepare($query);
        // $stmt->bind_param($query_4);


        // $stmt->execute();

        return [
           'resultat' =>  $resultat,
           'id' => self::$db->insert_id
        ];
    }

    // Actualitzar el registre
    public function actualitzar() {
        // Sanititzar los dades
        $atributs = $this->sanititzarAtributs();

        // Iterar per anar afegint cada camp de la BD
        $valors = [];
        foreach($atributs as $key => $value) {
            $valors[] = "{$key}='{$value}'";
        }

        // Consulta SQL
        $query = "UPDATE " . static::$taula ." SET ";
        $query .=  join(', ', $valors );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 

        // Actualitzar BD
        $resultat = self::$db->query($query);
        return $resultat;
    }

    // Eliminar un registre por su ID
    public function eliminar() {
        $query = "DELETE FROM "  . static::$taula . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultat = self::$db->query($query);
        return $resultat;
    }
}