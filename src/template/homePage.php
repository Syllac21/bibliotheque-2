<?php 
$title = 'accueil';
ob_start();?>



<div class="container mx-auto flex flex-col md:flex-row items-center justify-center gap-4">
         
    <img src="/src/images/accueil.webp" alt="Image d'accueil" class="w-full h-auto object-cover rounded-lg shadow-lg">
            
    <div class="md:w-3/4 bg-gray-700 px-5">
        <h1 class="text-4xl font-bold mb-4 text-center md:text-left">Bienvenue dans l'Univers de la Science-Fiction</h1>
        <p class="text-lg text-center md:text-left">Plongez au cœur d'aventures galactiques, de mondes futurs et d'explorations interstellaires. Ici, chaque page vous transporte vers des réalités parallèles, où la technologie côtoie l'inconnu et où l'imagination n'a aucune limite. Que vous soyez passionné de space opera, fasciné par les dystopies ou amateur de récits cyberpunk, nous avons sélectionné pour vous les meilleures œuvres du genre.</p>
        <p class="text-lg text-center md:text-left">Découvrez des auteurs visionnaires, des histoires captivantes et des récits qui repoussent les frontières du possible. Préparez-vous à explorer l’infini.</p>
        <p class="text-lg text-center md:text-left"><span>L'aventure commence maintenant !</span></p>
    </div>
    
</div>


<?php
$content = ob_get_clean();

require_once(__DIR__.'./layout.php');