<fieldset class="formulari__fieldset">
    <legend class="formulari__legend">Detalls del Material Didàctic</legend>

    <div class="formulari__camp">
        <label for="nom" class="formulari__label">Nom</label>
        <input
            type="text"
            class="formulari__input"
            id="nom"
            name="nom"
            placeholder="Nom del material didàctic"
            value="<?php echo $llibre->nom ?? ''; ?>"
        >
    </div>

    <div class="formulari__camp">
        <label for="cognom" class="formulari__label">Descripció</label>
        <input
            type="text"
            class="formulari__input"
            id="cognom"
            name="cognom"
            placeholder="Petita descripció"
            value="<?php echo $llibre->cognom ?? ''; ?>"
        >
    </div>

    <div class="formulari__camp">
        <label for="ciutat" class="formulari__label">Autor/a</label>
        <input
            type="text"
            class="formulari__input"
            id="ciutat"
            name="ciutat"
            placeholder="Autor/a del material didàctic"
            value="<?php echo $llibre->ciutat ?? ''; ?>"
        >
    </div>

    <div class="formulari__camp">
        <label for="pais" class="formulari__label">Any</label>
        <input
            type="text"
            class="formulari__input"
            id="pais"
            name="pais"
            placeholder="Any d'edició"
            value="<?php echo $llibre->pais ?? ''; ?>"
        >
    </div>
    <div class="formulari__camp">
        <label for="fileToUpload" class="formulari__label">Imatge de la Portada</label>
        <input
            type="file"
            class="formulari__input formulari__input--file"
            id="fileToUpload"
            name="fileToUpload"
        >
    </div>

    <?php if(isset($llibre->imatge_actual)) { ?>
        <p class="formulario__texto">Imatge Actual (.png):</p>
        <div class="formulario__imatge">
            <picture>
                <!-- <source srcset="<?php echo $_ENV['HOST'] . '/img/llibres/' . $llibre->imatge; ?>.webp" type="image/webp"> -->
                <source srcset="<?php echo $_ENV['HOST'] . '/img/llibres/' . $llibre->imatge; ?>" type="image/png">
                <img src="<?php echo $_ENV['HOST'] . '/img/llibres/' . $llibre->imatge; ?>" alt="imatge llibre">
            </picture>
        </div>

    <?php } ?>
</fieldset>

<fieldset class="formulari__fieldset">
    
    <legend class="formulari__legend">Informació Extra</legend>

    <div class="formulari__camp">
        <label for="tags_input" class="formulari__label"><b>Temàtiques</b> (separades per coma, doble clic per eliminar)</label>
        <input
            type="text"
            class="formulari__input"
            id="tags_input"
            placeholder="Exemple: Conte Visual, Conte Sensorial, Narració, Didàctic"
        >

        <div id="tags" class="formulari__llistat"></div>
        <input type="hidden" name="tags" value="<?php echo $llibre->tags ?? ''; ?>"> 
    </div>
</fieldset>

<fieldset class="formulari__fieldset">
    <legend class="formulari__legend">Xarxes Sociales</legend>

    <div class="formulari__camp">
        <div class="formulari__contenidor-icon">
            <div class="formulari__icon">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input
                type="text"
                class="formulari__input--social"
                name="social[facebook]"
                placeholder="Facebook"
                value="<?php echo $social->facebook ?? ''; ?>"
            >
        </div>
    </div>

    <div class="formulari__camp">
        <div class="formulari__contenidor-icon">
            <div class="formulari__icon">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <input
                type="text"
                class="formulari__input--social"
                name="social[twitter]"
                placeholder="Twitter"
                value="<?php echo $social->twitter ?? ''; ?>"
            >
        </div>
    </div>

    <div class="formulari__camp">
        <div class="formulari__contenidor-icon">
            <div class="formulari__icon">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <input
                type="text"
                class="formulari__input--social"
                name="social[youtube]"
                placeholder="YouTube"
                value="<?php echo $social->youtube ?? ''; ?>"
            >
        </div>
    </div>

    <div class="formulari__camp">
        <div class="formulari__contenidor-icon">
            <div class="formulari__icon">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input
                type="text"
                class="formulari__input--social"
                name="social[instagram]"
                placeholder="Instagram"
                value="<?php echo $social->instagram ?? ''; ?>"
            >
        </div>
    </div>

    <div class="formulari__camp">
        <div class="formulari__contenidor-icon">
            <div class="formulari__icon">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input
                type="text"
                class="formulari__input--social"
                name="social[tiktok]"
                placeholder="Tiktok"
                value="<?php echo $social->tiktok ?? ''; ?>"
            >
        </div>
    </div>


</fieldset>