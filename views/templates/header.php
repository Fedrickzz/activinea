<div class="barra">
    <div class="barra__contingut">
        <a href="/">
            <img src="build/img/LOGO.png" class="nav-logo" title="logo-activinea"/>  
        </a>
        <nav class="navigation">
            <a href="/info" class="navigation__link">Informació</a>
            <a href="/plans" class="navigation__link">Serveis</a>
            <a href="/llibres" class="navigation__link">LLibres Inclusius</a>
            <a href="/registre" class="navigation__link session">Registra't</a>
            <a href="/login" class="navigation__link session">Inicia Sessió</a>
        </nav>
    </div>
</div>


<?php 
$endpoint = "$_SERVER[REQUEST_URI]";
if ($endpoint == "/") {

?>
<header class="header">
    <div class="header__contenidor">

        <div class="header__contingut">
            <a href="/">
                <h1 class="header__logo">
                    Activinea
                </h1>
            </a>

            <p class="header__text">Adaptant l'educació</p>
            <a href="/llibres" class="header__button">Llibres Inclusius</a>

        </div>
    </div>


</header>
<?php
}
?>

