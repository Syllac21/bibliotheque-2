<?php
require_once(dirname(__DIR__,2).'/src/models/Users.php');

class Test{
    public function testId($id)
    {
        if(!is_numeric($id)){
            return false;
        }
        return true;
    }

    public function testLogin($postData)
    {
        $obj_users = new Users;
        $users = $obj_users->getUsers();
        if(
            !empty($postData['email']) &&
            !empty($postData['password']) &&
            filter_var($postData['email'])
        ){
            foreach($users as $user){
                if(
                    $user['email'] === $postData['email'] &&
                    password_verify($postData['password'],$user['password'])
                ){
                    $_SESSION['LOGGED_USER'] = [
                        'email' => $user['email'],
                        'id' => $user['id'],
                        'role' => $user['role'],
                    ];
                    return true;
                }
            }
            
        }
        return false;

    }

    public function testAddUser($postData)
    {
        // on vérifie que le visiteur vient de notre site

        if($postData['token'] === $_SESSION['token']){
                
            // on vérifie la méthode

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                
                // on vérifie le pot de miel
                if(isset($postData['country']) && empty($postData['country'])){
                    // validation des données

                    if(
                        empty(trim($postData['firstname'])) ||
                        empty(trim($postData['lastname'])) ||
                        empty(trim($postData['email'])) ||
                        empty(trim($postData['password'])) ||
                        !filter_var($postData['email'], FILTER_VALIDATE_EMAIL)
                    ){
                        return false;
                    }

                    // récupération des données

                    $firstname=trim(strip_tags($postData['firstname']));
                    $lastname=trim(strip_tags($postData['lastname']));
                    $email=trim(strip_tags($postData['email']));
                    $role = 'reader';

                    // hachage du mot de passe
                    $password=password_hash(trim(strip_tags($postData['password'])), PASSWORD_DEFAULT);

                    $objUser= new Users;
                    if(!$objUser->addUser($firstname, $lastname, $email, $password, $role)){
                        return false;
                    }

                    return true;
                }
            }

        } else{
            return true;
        }
    }
}