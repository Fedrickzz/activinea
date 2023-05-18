<h2 class="dashboard__heading"><?php echo $titol; ?></h2>

<div class="dashboard__contenidor-button">
    <a class="dashboard__button" href="/user/registrats/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Afegir Usuari
    </a>
</div>

<div class="dashboard__contenidor">
    <?php if(!empty($usuaris)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nom</th>
                    <th scope="col" class="table__th">Rol</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($usuaris as $usuari) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $usuari->nom . ", " . $usuari->cognom; ?>
                        </td>
                        <td class="table__td">
                            <?php 
                                if ($usuari->admin == 1) {
                                    echo 'Administrador'; 
                                } else if( $usuari->admin == 2) {
                                    echo 'Professor'; 
                                } else if( $usuari->admin == 3) {
                                    echo 'Alumne'; 
                                }
                            ?>
                        </td>
                        <td class="table__td--accions">
                            <a class="table__accio table__accio--editar" href="/user/registrats/editar?id=<?php echo $usuari->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>

                            <form method="POST" action="/user/registrats/eliminar" class="table__formulari">
                                <input type="hidden" name="id" value="<?php echo $usuari->id; ?>">
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
        <p class="text-center">No hi ha usuaris encara</p>
    <?php } ?>
</div>

<?php 
    echo $paginacio;
?>