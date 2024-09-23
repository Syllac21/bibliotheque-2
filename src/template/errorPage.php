<?php 

$title = 'Erreur';
ob_start();?>
<body class="bg-gray-900 text-white">
    <H1 class="text-5xl text-center text-white">Une erreur s'est produite : <?=$error?></H1>
    <?php var_dump($_POST); 
    var_dump($_SESSION);
    ?>

</body>
<?php
$content = ob_get_clean();

require_once(__DIR__.'./layout.php');