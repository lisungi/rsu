<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require __DIR__ . '/vendor/autoload.php';

$DB = new PDO('mysql:dbname=rsu;host=localhost;', 'root', 'Nasa2020');


$auth = new \Delight\Auth\Auth($DB);


try {
    $userId = $auth->admin()->createUser("svembe@gmail.com", "NASA2020", "Redaction");

    echo "User ID : " . $userId;

    try {
        $auth->admin()->addRoleForUserById($userId, \Delight\Auth\Role::SUPER_ADMIN);
    } catch (\Delight\Auth\UnknownIdException $e) {
        echo "unknown user ID";
    }

} catch (\Delight\Auth\InvalidEmailException $e) {
    echo "invalid email address";
} catch (\Delight\Auth\InvalidPasswordException $e) {
    echo "invalid password";
} catch (\Delight\Auth\UserAlreadyExistsException $e) {
    echo "user already exists";
}
 
// unlink(__FILE__);