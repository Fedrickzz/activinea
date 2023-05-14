<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activinea - <?php echo $titol; ?></title>
    <link rel="shortcut icon" href="/build/img/favicon.ico"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body class="dashboard">
        <?php 
            include_once __DIR__ .'/templates/admin-header.php';
        ?>
        <div class="dashboard__grid">

            <?php
                // admin
                if ($_SESSION['admin'] == 1) {
                    include_once __DIR__ .'/templates/sidebar-admin.php';  
                } else if ($_SESSION['admin'] == 2) {
                    include_once __DIR__ .'/templates/sidebar-professor.php';  
                } else if ($_SESSION['admin'] == 3) {
                    include_once __DIR__ .'/templates/sidebar-alumne.php';  
                }
            ?>

            <main class="dashboard__contingut">
                <?php 
                    echo $contingut; 
                ?> 
            </main>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/build/js/main.min.js" defer></script>
</body>
</html>