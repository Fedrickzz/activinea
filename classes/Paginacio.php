<?php 

namespace Classes;

class Paginacio {
    public $pagina_actual;
    public $registres_per_pagina;
    public $total_registres;

    public function __construct($pagina_actual = 1, $registres_per_pagina = 10, $total_registres = 0 )
    {
        $this->pagina_actual = (int) $pagina_actual;
        $this->registres_per_pagina = (int) $registres_per_pagina;
        $this->total_registres = (int) $total_registres;
    }

    public function offset() {
        return $this->registres_per_pagina * ($this->pagina_actual - 1);
    }

    public function total_pagines() {
        $total = ceil($this->total_registres / $this->registres_per_pagina);
        $total == 0 ? $total = 1 : $total = $total;
        return $total;
    }

    public function pagina_anterior() {
        $anterior = $this->pagina_actual - 1;
        return ($anterior > 0) ? $anterior : false;
    }

    public function pagina_seguent() {
        $seguent = $this->pagina_actual + 1;
        return ($seguent <= $this->total_pagines()) ? $seguent : false;
    }

    public function link_anterior() {
        $html = '';
        if($this->pagina_anterior()) {
            $html .= "<a class=\"paginacio__link paginacio__link--text\" href=\"?page={$this->pagina_anterior()}\">&laquo; Anterior </a>";
        }
        return $html;
    }

    public function link_seguent() {
        $html = '';
        if($this->pagina_seguent()) {
            $html .= "<a class=\"paginacio__link paginacio__link--texto\" href=\"?page={$this->pagina_seguent()}\">Següent &raquo;</a>";
        }
        return $html;
    }

    public function numeros_pagines() {
        $html = '';
        for($i = 1; $i <= $this->total_pagines(); $i++) {
            if($i === $this->pagina_actual ) {
                $html .= "<span class=\"paginacio__link paginacio__link--actual \">{$i}</span>";
            } else {
                $html .= "<a class=\"paginacio__link paginacio__link--numero \" href=\"?page={$i}\">{$i}</a>";
            }
        }

        return $html;
    }

    public function paginacio() {
        $html = '';
        if($this->total_registres > 1) {
            $html .= '<div class="paginacio">';
            $html .= $this->link_anterior();
            $html .= $this->numeros_pagines();
            $html .= $this->link_seguent();
            $html .= '</div>';
        }

        return $html;
    }

}