<?php 
require_once(dirname(__DIR__,1).'/models/Books.php');
$bookitem = new Books;
$books = $bookitem->getBooks();

$title = 'Produits';
ob_start();?>
<body class="bg-gray-900 text-white">
    <main class="container mx-auto p-5">
        <section class="md:grid grid-cols-5 xl:grid grid-col3 gap-5">
            <?php foreach ($books as $book) : ?>
                <article class="card rounded-xl overflow-hidden shadow-xl bg-gray-500 bg-opacity-60 hover:shadow-2xl relative">
                    
                    <img class="w-full h-52" src="/src/images/<?=$book['image'] ?>.jpg" alt="image de <?= $book['title'] ?>" />
                    
                    <div class="px-6 py-4 mb-10">
                        <h2 class="text-2xl mb-2 text-gray-200"><?= $book['title'] ?></h2>
                        <ul>
                            
                            <li><?=$book['autor'] ?></li>
                            <li><?=$book['category']?></li>
                            <li class="no-undreline hover:underline text-white"><?=$book['serie']?> </li>
                        </ul>
                    </div>
                    <div class="px-6 py-4">
                        <a href='index.php?id=<?=$book['id']?>' class="px-3 py-4 bg-gray-200 rounded-2xl absolute bottom-0">En savoir plus</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    </main>


</body>
<?php
$content = ob_get_clean();

require_once(__DIR__.'./layout.php');