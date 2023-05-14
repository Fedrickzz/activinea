<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__link <?php echo pagina_actual('/dashboard') ? 'dashboard__link--actual' : ''; ?> ">
            <i class="fa-solid fa-house dashboard__icon"></i>
            <span class="dashboard__menu-text">
                Inici
            </span>    
        </a>

        <a href="/admin/llibres" class="dashboard__link <?php echo pagina_actual('/llibres') ? 'dashboard__link--actual' : ''; ?> ">
            <i class="fa-solid fa-book dashboard__icon"></i>
            <span class="dashboard__menu-text">
                Llibres
            </span>    
        </a>

        <a href="/admin/activitats" class="dashboard__link <?php echo pagina_actual('/activitats') ? 'dashboard__link--actual' : ''; ?> ">
            <i class="fa-solid fa-puzzle-piece dashboard__icon"></i>
            <span class="dashboard__menu-text">
                Activitats
            </span>    
        </a>

        <a href="/admin/registrats" class="dashboard__link <?php echo pagina_actual('/registrats') ? 'dashboard__link--actual' : ''; ?> ">
            <i class="fa-solid fa-users dashboard__icon"></i>
            <span class="dashboard__menu-text">
                Usuaris
            </span>    
        </a>
        <a href="/admin/opcions" class="dashboard__link <?php echo pagina_actual('/opcions') ? 'dashboard__link--actual' : ''; ?> ">
            <i class="fa-solid fa-gear dashboard__icon"></i>
            <span class="dashboard__menu-text">
                Opcions
            </span>    
        </a>
    </nav>
</aside>