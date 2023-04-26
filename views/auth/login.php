<main class="auth">
    <h2 class="auth__heading"><?php echo $titol; ?></h2>
    <p class="auth__text">Introduix les teves dades personals</p> 

    <?php 
        require_once __DIR__ . '/../templates/alertes.php';
    ?>

    <form method="POST" action="/login" class="formulari">
        <div class="formulari__camp">
            <label for="email" class="formulari__label">Email</label>
            <input
                type="email"
                class="formulari__input"
                placeholder="El teu Email"
                id="email"
                name="email"
            >
        </div>

        <div class="formulari__camp">
            <label for="password" class="formulari__label">Contrasenya</label>
            <input
                type="password"
                class="formulari__input"
                placeholder="La teva contrasenya"
                id="password"
                name="password"
            >
        </div>

        <input type="submit" class="formulari__submit" value="Iniciar Sessió">
    </form>

    <div class="accions">
        <a href="/registre" class="accions__link">Encara no tens una compta? Crea una</a>
        <a href="/oblidada" class="accions__link">Has oblidat la teva contrasenya?</a>
    </div>
</main>