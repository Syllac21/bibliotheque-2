<?php
require_once(dirname(__DIR__,1).'/models/Books.php');

$bookItem = new Books;
$book = $bookItem->getBook($_GET['id']);

$title = $book[0]['title'];
ob_start(); 

?>
<body class="bg-gray-900 text-white">
<main class="container mx-auto p-5">
        
        <section class="grid grid-cols-2 gap-3">
            <div class=" rounded-lg px-5 bg-gray-500 bg-opacity-60 pt-5">
                <h3 class="text-2xl font-semibold mb-5 text-gray-200"> <?php echo $book[0]['title']; ?> </h3>
                <p class="mb-3 text-xl text-gray-200 text-justify"><?php echo $book[0]['autor']; ?> </p>
                <p class="text-gray-200 italic">Taille moyenne :<?php echo $book[0]['category']; ?> </p>
                <p class="text-gray-200 text-2xl" >Prix : <?=$book[0]['price'] ?> €</p>
            </div>
            <div class="mx-auto">
                <img class="rounded-xl" src="/src/images/<?php echo $book[0]['image']; ?>.jpg" alt="couvertue de <?php echo $book[0]['title']; ?> ">
            </div>
        </section>
    </main>
    
</body>
<?php
$content = ob_get_clean();

require_once(__DIR__.'./layout.php');