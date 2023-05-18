<main class="auth">
    <h2 class="auth__heading"><?php echo $titol; ?></h2>
    
    <?php 
        require_once __DIR__ . '/../templates/alertes.php';
    ?>

    <?php if(isset($alertes['error'])) { ?>
        <p class="auth__text">Confirmació No Exitosa</p> 

    <?php } ?>

    <?php if(isset($alertes['success'])) { ?>
        <p class="auth__text">Confirmació Exitosa</p> 

        

        <div class="accions accions--centrar">
            <a href="/login" class="accions__link">Iniciar Sessió</a>
        </div>
    <?php } ?>



</main>