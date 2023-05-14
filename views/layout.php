<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activinea - <?php echo $titol; ?></title>
    <link rel="shortcut icon" href="build/img/favicon.ico"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <?php 
        if(is_auth()) {
            include_once __DIR__ .'/templates/header-session.php';
        } else {
            include_once __DIR__ .'/templates/header.php';
        }
        echo $contingut;
        include_once __DIR__ .'/templates/footer.php'; 
    ?>
    <script src="/build/js/bundle.min.js" defer></script>
</body>
</html>