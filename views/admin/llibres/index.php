<h2 class="dashboard__heading"><?php echo $titol; ?></h2>

<div class="dashboard__contenidor-button">
    <a class="dashboard__button" href="/user/llibres/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Afegir Llibre
    </a>
</div>

<div class="dashboard__contenidor">
    <?php if(!empty($llibres)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nom</th>
                    <th scope="col" class="table__th">Temàtica</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($llibres as $llibre) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $llibre->nom ?>
                        </td>
                        <td class="table__td">
                            <?php echo $llibre->cognom; ?>
                        </td>
                        <td class="table__td--accions">
                            <a class="table__accio table__accio--editar" href="/user/llibres/editar?id=<?php echo $llibre->id; ?>">
                                <i class="fa-solid fa-file-pen"></i>
                                Editar
                            </a>

                            <form method="POST" action="/user/llibres/eliminar" class="table__formulari">
                                <input type="hidden" name="id" value="<?php echo $llibre->id; ?>">
                                <button class="table__accio table__accio--eliminar" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="text-center">No hi ha llibres encara</p>
    <?php } ?>
</div>

<?php 
    echo $paginacio;
?>