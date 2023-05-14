<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__link <?php echo pagina_actual('/dashboard') ? 'dashboard__link--actual' : ''; ?> ">
            <i class="fa-solid fa-house dashboard__icon"></i>
            <span class="dashboard__menu-text">
                Inici
            </span>    
        </a>


        <a href="/admin/activitats" class="dashboard__link <?php echo pagina_actual('/activitats') ? 'dashboard__link--actual' : ''; ?> ">
            <i class="fa-solid fa-puzzle-piece dashboard__icon"></i>
            <span class="dashboard__menu-text">
                Activitats
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