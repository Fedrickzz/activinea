<main class="auth">
    <h2 class="auth__heading"><?php echo $titol; ?></h2>
    <p class="auth__text">Introdueix les teves dades personals</p> 

    <?php 
        require_once __DIR__ . '/../templates/alertes.php';
    ?>

    <form method="POST" action="/registre" class="formulari">
        <div class="formulari__camp">
            <label for="nom" class="formulari__label">Nom</label>
            <input
                type="text"
                class="formulari__input"
                placeholder="El teu nom"
                id="nom"
                name="nom"
                value="<?php echo $usuari->nom; ?>"
            >
        </div>

        <div class="formulari__camp">
            <label for="cognom" class="formulari__label">Cognom</label>
            <input
                type="text"
                class="formulari__input"
                placeholder="El teu cognom"
                id="cognom"
                name="cognom"
                value="<?php echo $usuari->cognom; ?>"
            >
        </div>

        <div class="formulari__camp">
            <label for="email" class="formulari__label">Email</label>
            <input
                type="email"
                class="formulari__input"
                placeholder="El teu Email"
                id="email"
                name="email"
                value="<?php echo $usuari->email; ?>"
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

        <div class="formulari__camp">
            <label for="password2" class="formulari__label">Repetir Contrasenya</label>
            <input
                type="password"
                class="formulari__input"
                placeholder="Repeteix la teva contrasenya"
                id="password2"
                name="password2"
            >
        </div>

        <input type="submit" class="formulari__submit" value="Crear Compte">
    </form>

    <div class="accions">
        <a href="/login" class="accions__link">Ja tens una compta? Inicia sessió</a>
        <a href="/oblidada" class="accions__link">Has oblidat la teva contrasenya?</a>
    </div>
</main>