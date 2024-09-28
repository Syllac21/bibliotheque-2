<?php
require_once(dirname(__DIR__,1).'/models/Pages.php');
require_once(dirname(__DIR__,1).'/models/Books.php');

$page = new Pages;
$book = new Books;
$categories = $book->getCategory();
$series = $book->getSeries();

if($_SESSION['LOGGED_USER']['role'] != 'lecteur') { 

    $title = 'Nouvel asana';

    ob_start(); 
    
    ?>


    <h2 class="text-center font-semibold leading-7 text-gray-300 text-2xl">Nouveau livre</h2>
    
    <form action="../src/controllers/addBookController.php" method="POST" class="mx-auto px-5 w-1/2 flex flex-col justify-center bg-clip-padding backdrop-filter backdrop-blur-md bg-opacity-30" enctype="multipart/form-data">
        <div class="space-y-12">
            
            <div class="border-b border-gray-900/10 pb-12">
            
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="title" class="block font-medium leading-6 text-gray-900">Titre</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title" class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-1/2">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="autor" class="block font-medium leading-6 text-gray-900">Auteur</label>
                        <div class="mt-2">
                            <input type="text" name="autor" id="autor" class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 w-1/2">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="category" class="block font-medium leading-6 text-gray-900">Catégorie</label>
                        <select name="category" id="category">
                            <?php for ($i = 0; $i < count($categories); $i++) : ?>
                                <option><?=$categories[$i]['category']?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="serie" class="block font-medium leading-6 text-gray-900">Série</label>
                        <select name="serie" id="serie">
                            <?php for ($j = 0; $j < count($series); $j++) : ?>
                                <option><?=$series[$j]['serie']?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <input type="hidden" name="idOwner" id="idOwner" value="<?=$_SESSION['LOGGED_USER']['id']?>">
                    <input type="hidden" name="image" id="image">
                    <input type="hidden" name="price" id="price" value="0">
                    
                    <div class="border-b border-gray-900/10 pb-12">
            
                        <!-- couverture -->
                        <div class="col-span-full">
                            <label for="image" class="block font-medium leading-6 text-gray-900">Image</label>
                            <div class="mt-2 flex items-center gap-x-3">                    
                                <input type="file" name="image" id="image" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Annuler</button>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Envoie</button>
        </div>
    </form>


    <?php $content = ob_get_clean(); 

    require_once('layout.php');
}