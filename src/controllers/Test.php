<?php
require_once(dirname(__DIR__,2).'/src/models/Pages.php');
$page = new Pages;

class Test{
    public function testId($id)
    {
        if(!is_numeric($id)){
            return false;
        }
        return true;
    }

    public function testLogin($user)
    {
        if(
            !empty($user['email']) &&
            !empty($user['password']) &&
            filter_var($user['email'])
        ){
            $_SESSION['LOGGED_USER'] = [
                'email' => $user['email'],
                'id_user' => $user['id_user'],
                'role' => $user['role'],
            ];
            return true;
        }
        return false;

    }
}