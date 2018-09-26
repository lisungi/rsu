<?php

function GetAllGroups()
{
    $req = Query("SELECT `groupes`.`nom_groupe`,`groupes`.`desc_groupe`,`groupes`.`observations` FROM `groupes` ");
    if (isset($req)) {
            return $req;
    } else {
            return false;
    }
}

function GetGroupByName($groupName)
{
    $req=Query("SELECT `groupes`.`nom_groupe`,`groupes`.`desc_groupe`,`groupes`.`observations` FROM `groupes` WHERE `groupes`.`nom_groupe`='$groupName' LIMIT 1");
    if (isset($req[0])) {
        return $req[0];
    } else {
        return false;
    }
}

function AddGroup($groupName, $groupDesc, $groupPermissions=array())
{
    global $DB;

    $perms = '';
    $msg = '';

    foreach (addPermissions($groupPermissions) as $key => $value) 
    {
        $perms .= $key . '=' . $value . '/';
    }
    
    if (GetGroupByName($groupName)) {
        $msg = $groupName . 'existe déjà';
        return $msg;
    } else {
        $DB->exec(
            "INSERT INTO `groupes` (`id` ,`nom_groupe` ,`desc_groupe`,`date_group`, `observations`)
                    VALUES (NULL , '$groupName',' $groupDesc', now(), '$perms')"
        );
        return $DB->lastInsertId();
    }
}

function addPermissions($newArry=array())
{
    $strArry = array();
    $myArray= array();
    foreach ($newArry as $key => $value) {
        $strArry = explode('-', $value);
        if (!array_key_exists($strArry[0], $myArray)) {
            $myArray[$strArry[0]] = shortenPerm($strArry[1]);
        } else {
            if ($strArry[1] == 'ecriture' || $strArry[1] == 'execution' ) {
                $myArray[$strArry[0]] = shortenPerm($strArry[1]);
            } 
        }
    }
    return $myArray;
}

function shortenPerm($permission='')
{
    if (!empty($permission)) {
        switch ($permission) {
            case 'lecture':
                $permission = "r";
                break;

            case 'ecriture':
                $permission = "rw";
                break;

            case 'execution':
                $permission = "rwx";
                break;
            
            default:
                $permission = "";
                break;
        }
        return $permission;
    }
}


