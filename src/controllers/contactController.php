<?php

    require_once(dirname(__DIR__,2).'/src/models/Pages.php');

    $postData = $_POST;
    $page = new Pages;

    // on vérifie la méthode
    if($_SERVER['REQUEST_METHOD']=== 'POST'){

        // on vérifie le pot de miel
        
        if(isset($_POST['category']) && empty($_POST['category'])){
        
            // on vérifie les données

            if(
                empty($postData['name']) ||
                empty($postData['firstName']) ||
                empty($postData['email']) ||
                empty($postData['message']) ||
                !filter_var($postData['email'], FILTER_VALIDATE_EMAIL)
            ){
                $pageDisplay = $page->errorPage('les champs ne sont pas remplis correctement');
                exit;
            }

            $nom = strip_tags($postData['name'])." ".strip_tags($postData['firstName']);
            $email = $postData['email'];
            $message = strip_tags($postData['message']);

            // Destinataire de l'e-mail (votre adresse e-mail)
            $destinataire = "syllac21@gmail.com";

            // Sujet de l'e-mail
            $sujet = "Nouveau message de contact depuis le site : Portail Galactique";

            // Corps de l'e-mail
            $corpsMessage = "Nom: $nom\n";
            $corpsMessage .= "E-mail: $email\n\n";
            $corpsMessage .= "Message:\n$message";

            // Entêtes de l'e-mail
            $entetes = "From: $nom <$email>\r\n";
            $entetes .= "Reply-To: $email\r\n";
            $entetes .= "MIME-Version: 1.0\r\n";
            $entetes .= "Content-type: text/plain; charset=utf-8\r\n";

            // Envoi de l'e-mail
            mail($destinataire, $sujet, $corpsMessage);

            $pageDisplay = $page->homePage();
        } else{
            $pageDisplay = $page->errorPage('pas la bonne méthode');
        }
    }else{
        $pageDisplay = $page->homePage();
    }