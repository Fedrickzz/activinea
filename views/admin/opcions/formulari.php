<fieldset class="formulari__fieldset">
    <legend class="formulari__legend">Informació Personal</legend>

    <div class="formulari__camp">
        <label for="nom" class="formulari__label">Nom</label>
        <input
            type="text"
            class="formulari__input"
            id="nom"
            name="nom"
            placeholder="Nom Usuari"
            value="<?php echo $usuari->nom ?? ''; ?>"
        >
    </div>

    <div class="formulari__camp">
        <label for="cognom" class="formulari__label">Cognom</label>
        <input
            type="text"
            class="formulari__input"
            id="cognom"
            name="cognom"
            placeholder="Cognom Usuari"
            value="<?php echo $usuari->cognom ?? ''; ?>"
        >
    </div>

    <div class="formulari__camp">
        <label for="ciutat" class="formulari__label">Ciutat</label>
        <input
            type="text"
            class="formulari__input"
            id="ciutat"
            name="ciutat"
            placeholder="Ciutat Usuari"
            value="<?php echo $usuari->ciutat ?? ''; ?>"
        >
    </div>

    <div class="formulari__camp">
        <label for="pais" class="formulari__label">País</label>
        <input
            type="text"
            class="formulari__input"
            id="pais"
            name="pais"
            placeholder="País Usuari"
            value="<?php echo $usuari->pais ?? ''; ?>"
        >
    </div>

    <div class="formulari__camp">
        <label for="pais" class="formulari__label">Rol</label>
    
        <select name="admin" id="admin">
            <option value="<?php echo $usuari->admin; ?>">
                <?php 
                    $rol = '';
                    if ($usuari->admin == 1) {
                        echo 'Administrador';
                        $rol = 1;

                    } else if( $usuari->admin == 2) {
                        echo 'Professor'; 
                        $rol = 2;

                    } else if( $usuari->admin == 3) {
                        echo 'Alumne'; 
                        $rol = 3;

                    }
                ?>
            </option>

            <?php 
            
                switch ($rol) {
                    case 1:
                        echo '<option value="2">Professor</option>';
                        echo '<option value="3">Alumne</option>';
                        
                        break;
                    case 2:
                        echo '<option value="3">Alumne</option>';
                        
                        break;
                    
                }
            ?>

        </select>
    </div>

    
</fieldset>


