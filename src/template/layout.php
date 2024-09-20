<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Portail Galactique</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Appliquer la police Roboto à tout le document */
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg_cover bg-center h_screen" style="background-image: url('/src/images/background.jpg');">
    <div class="wrapper">
        <?php require_once(dirname(__DIR__,2).'/src/components/header.php');
        echo $content;?>
        <footer class="absolute bottom-0 left-0 right-0 text-white">
            <?php require_once(dirname(__DIR__,2).'/src/components/footer.php');?>
        </footer>
        
    </div>
    

</body>
</html> 