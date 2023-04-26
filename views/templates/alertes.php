<?php
    foreach($alertes as $key => $alerta) {
        foreach($alerta as $missatge) {
?>
    <div class="alerta alerta__<?php echo $key; ?>"><?php echo $missatge; ?></div>
<?php 
        }
    }
?>
