<main class="auth">
    <h2 class="auth__heading"><?php echo $titol; ?></h2>
    <p class="auth__text">Escriu la nova contrasenya</p> 

    <?php
        require_once __DIR__ . '/../templates/alertes.php';
    ?>

    <?php if($token_valid) { ?>
        <form method="POST" class="formulari">
            <div class="formulari__camp">
                <label for="password" class="formulari__label">Nova Contrasenya</label>
                <input
                    type="password"
                    class="formulari__input"
                    placeholder="La nova Contrasenya"
                    id="password"
                    name="password"
                >
            </div>

            <input type="submit" class="formulari__submit" value="Guardar Contrasenya">
        </form>
    <?php } ?>

    <div class="accions">
        <a href="/login" class="accions__link">Ja tens un compte? Inicia sessió</a>
        <a href="/registre" class="accions__link">Encara no tens un compte? Crea un</a>
    </div>
</main>