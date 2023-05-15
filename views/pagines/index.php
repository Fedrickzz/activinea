<?php
    include_once __DIR__ . '/assessorament.php';
?>



<section class="speakers">
    <h2 class="speakers__heading">Llibres inclusius</h2>
    <p class="speakers__descripcio">Aprèn amb els nostres llibres</p>

    <div class="speakers__grid">
        <?php foreach($llibres as $llibre) { ?>
            <div <?php aos_animacio(); ?> class="speaker">
                <picture>
                    <!-- <source srcset="img/llibres/<?php echo $llibre->imatge; ?>.webp" type="image/webp"> -->
                    <source srcset="img/llibres/<?php echo $llibre->imatge; ?>" type="image/png">
                    <img class="speaker__imatge" loading="lazy" width="200" height="300" src="img/llibres/<?php echo $llibre->imatge; ?>" alt="Imatge Llibre">
                </picture>

                <div class="speaker__informacio">
                    <h4 class="speaker__nom">
                        <?php echo $llibre->nom; ?>
                    </h4>

                    <p class="speaker__ubicacio">
                        <?php echo $llibre->cognom; ?>
                    </p>

                    <nav class="speaker-socials">
                        <?php
                            $social =  json_decode($llibre->social);
                        ?>
                        
                        <?php if(!empty($social->facebook)) { ?>
                            <a class="speaker-socials__link" rel="noopener noreferrer" target="_blank" href="<?php echo $social->facebook; ?>">
                                <span class="speaker-social__ocultar">Facebook</span>
                            </a> 
                        <?php } ?>

                        <?php if(!empty($social->twitter)) { ?>
                            <a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?php echo $social->twitter; ?>">
                                <span class="speaker-social__ocultar">Twitter</span>
                            </a> 
                        <?php } ?> 

                        <?php if(!empty($social->youtube)) { ?>
                            <a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?php echo $social->youtube; ?>">
                                <span class="speaker-social__ocultar">YouTube</span>
                            </a> 
                        <?php } ?> 

                        <?php if(!empty($social->instagram)) { ?>
                            <a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?php echo $social->instagram; ?>">
                                <span class="speaker-social__ocultar">Instagram</span>
                            </a> 
                        <?php } ?> 

                        <?php if(!empty($social->tiktok)) { ?>
                            <a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?php echo $social->tiktok; ?>">
                                <span class="speaker-social__ocultar">Tiktok</span>
                            </a> 
                        <?php } ?> 

                        
                    </nav>

                    <ul class="speaker__llistat-skills">
                        <?php 
                            $tags = explode(',', $llibre->tags);
                            foreach($tags as $tag) { 
                        ?>
                            <li class="speaker__skill"><?php echo $tag; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<div id="mapa" class="mapa"></div>

<section class="boletos">
    <h2 class="boletos__heading">Els nostres Productes i Serveis</h2>
    <p class="boletos__descripcio">Preus material didàctic</p>

    <div class="boletos__grid">
        

        <div <?php aos_animacio(); ?> class="boleto boleto--gratis">
            <h4 class="boleto__logo">Programari</h4>
            <p class="boleto__plan">Educatiu Adaptat</p>
            <p class="boleto__preu">90€</p>
        </div>

        <div <?php aos_animacio(); ?> class="boleto boleto--presencial">
            <h4 class="boleto__logo">Material Educatiu</h4>
            <p class="boleto__plan">Format Digital</p>
            <p class="boleto__preu">165€</p>
        </div>

        <div <?php aos_animacio(); ?> class="boleto boleto--virtual">
            <h4 class="boleto__logo">Programes formatius</h4>
            <p class="boleto__plan">Per professionals del sector</p>
            <p class="boleto__preu">250€</p>
        </div>
    </div>
</section>