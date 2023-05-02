<main class="auth">
    <h2 class="auth__heading"><?php echo $titol; ?></h2>
    <p class="auth__text">Confirmació Exitosa</p> 
    
    <?php 
        require_once __DIR__ . '/../templates/alertes.php';
    ?>

    <?php if(isset($alertes['success'])) { ?>
        <div class="accions accions--centrar">
            <a href="/login" class="accions__link">Iniciar Sessió</a>
        </div>
    <?php } ?>

</main>