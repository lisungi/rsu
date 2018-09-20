<?php

function SetUtilisateurs($userid, $twitter, $info)
{
    global $DB;
    
    if (GetAuthorInfo($userid)) {
        return UpdateAuthorInfo($userid, $twitter, $info);
    } else {
        $DB->exec("INSERT INTO `author` (`id` ,`userid` ,`twitter`,`info`)
                      VALUES (NULL , '$userid','$twitter','$info')");
        return $DB->lastInsertId();
    }
}

function GetAuthorInfo($userid)
{
    $req=Query("SELECT `users`.`id`,`users`.`username`,`author`.`image`,`author`.`siteid`,`author`.`twitter`,`author`.`info`,`author`.`slug` FROM `author`, `users` WHERE `author`.`userid`=`users`.`id` AND `author`.`userid`='$userid' LIMIT 1");
    if (isset($req[0])) {
        return $req[0];
    } else {
        return false;
    }
}

function GetAuthorInfoBySlug($userid)
{
    $req=Query("SELECT `users`.`id`,`users`.`username`,`author`.`image`,`author`.`twitter`,`author`.`info`,`author`.`slug` FROM `author`, `users` WHERE `author`.`userid`=`users`.`id` AND `author`.`slug`='$userid' LIMIT 1");
    if (isset($req[0])) {
        return $req[0];
    } else {
        return false;
    }
}
function UpdateAuthorInfo($userid, $twitter, $info)
{
    global $DB;
    
    return $DB->exec("UPDATE `author` SET `twitter`='$twitter', `info`=$info WHERE `userid`='$userid'");
}



function UpdateAuthorImage($userid, $image)
{
    global $DB;
    
    return $DB->exec("UPDATE `author` SET `image`='$image'  WHERE `userid`='$userid'");
}

function ListAuthorInfo()
{
    $req=Query("SELECT `users`.`id`,`users`.`username`,`author`.`image`,`author`.`twitter`,`author`.`info` FROM `author`, `users` WHERE `author`.`userid`=`users`.`id` ORDER BY `users`.`username` ASC");
    if (isset($req[0])) {
        return $req[0];
    } else {
        return false;
    }
}
