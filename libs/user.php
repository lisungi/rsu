<?php

function AddUser($username, $mail, $pass, $cname, $type)
{

    global $DB, $auth;
    $done = false;
    try {
        $userId = $auth->admin()->createUser($mail, $pass, $username);

        try {
            if ($type == "author") $auth->admin()->addRoleForUserById($userId, \Delight\Auth\Role::AUTHOR);
            else if ($type == "moderator") $auth->admin()->addRoleForUserById($userId, \Delight\Auth\Role::MODERATOR);
            else if ($type == "admin") $auth->admin()->addRoleForUserById($userId, \Delight\Auth\Role::ADMIN);

            $done = true;
        } catch (\Delight\Auth\UnknownIdException $e) {
            //echo "unknown user ID";
            \Delight\Cookie\Session::set("user", "role");
        }

    } catch (\Delight\Auth\InvalidEmailException $e) {
        //echo "invalid email address";
        \Delight\Cookie\Session::set("user", "mail");
    } catch (\Delight\Auth\InvalidPasswordException $e) {
        //echo "invalid password";
        \Delight\Cookie\Session::set("user", "pass");
    } catch (\Delight\Auth\UserAlreadyExistsException $e) {
        //echo "user already exists";
        \Delight\Cookie\Session::set("user", "exist");
    }

    if ($done) {
        $DB->exec(
            "INSERT INTO `utilisateurs` (`id`, `userid`, `noms`, `sexe`, 
`phone`, `adresse`, `creation_date`, `est_actif`,`code_utilisateur`, `user_group`, 
`droits`, `observations`, `loginTime`, `loginAction`) 
VALUES (NULL, '$userId', '$cname', NULL, NULL, NULL, 
now(), '0', NULL, NULL, NULL, NULL, NULL, NULL)"
        );
        return $userId;

    } else {

        return false;

    }

}

function GetUsers()
{
    $req = Query("SELECT `users`.`id`,`users`.`email`,`users`.`username`,`utilisateurs`.`id`, `utilisateurs`.`noms` ,`utilisateurs`.`est_actif`, `utilisateurs`.`loginTime` FROM `utilisateurs`,`users`  WHERE `users`.`id`=`utilisateurs`.`userid` ");
    return $req;
}

function AddToGroup()
{
    
}