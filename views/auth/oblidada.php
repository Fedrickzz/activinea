<main class="auth">
    <h2 class="auth__heading"><?php echo $titol; ?></h2>
    <p class="auth__text">Recupera el teu accés a Activinea</p> 

    <?php
        require_once __DIR__ . '/../templates/alertes.php';
    ?>

    <form method="POST" action="/oblidada" class="formulari">
        <div class="formulari__camp">
            <label for="email" class="formulari__label">Email</label>
            <input
                type="email"
                class="formulari__input"
                placeholder="El teu email"
                id="email"
                name="email"
            >
        </div>

        <input type="submit" class="formulari__submit" value="Enviar Instruccions">
    </form>


    <div class="accions">
        <a href="/login" class="accions__link">Ja tens una compta? Inicia sessió</a>
        <a href="/registre" class="accions__link">Encara no tens una compta? Crea una</a>
    </div>
</main>