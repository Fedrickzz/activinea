<h2 class="dashboard__heading"><?php echo $titol; ?></h2>

<div class="dashboard__contenidor-button">
    <a class="dashboard__button" href="/user/registrats">
        <i class="fa-solid fa-circle-arrow-left"></i>
        Tornar
    </a>
</div>

<div class="dashboard__formulari">
    <?php 
        include_once __DIR__ . './../../templates/alertes.php';
    ?>

    <form method="POST" action="/user/registrats/crear" enctype="multipart/form-data" class="formulari">
        <?php include_once __DIR__ . '/formulari.php'; ?>

        <input class="formulari__submit formulari__submit--registrar" type="submit" value="Registrar Usuari Nou">
    </form>
</div>