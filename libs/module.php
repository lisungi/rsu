<?php
function GetAllModules()
{
    $req = Query("SELECT `modules`.`nom_module`,`modules`.`permissions_module`,`modules`.`creation_date` FROM `modules` ");
    if (isset($req)) {
        return $req;
    } else {
        return false;
    }
}

function GetModule($modName)
{
    $req = Query("SELECT `modules`.`nom_module` FROM `modules` WHERE `nom_module`='$modName' ");
    if (isset($req)) {
        return $req;
    } else {
        return false;
    }
}

function AddModules($moduleName)
{
    global $DB;

    $modName = $moduleName;

    if (GetModule(preg_replace("/(?<=[a-z])-(?=[a-z])/i", " ",  $modName))) {
        foreach (GetModule(preg_replace("/(?<=[a-z])-(?=[a-z])/i", " ",  $modName)) as $item) {
            $msg .= $item['nom_module']. ' existe déjà ';
        }
        return $msg;
    } else {
        $DB->exec(
            "INSERT INTO `modules` (`id`, `nom_module`, `permissions_module`, `creation_date`) 
                    VALUES (NULL, '$modName ', 'rw', now())"
        );
        return $DB->lastInsertId();
    }
}

function unShortenPerm($permission)
{
    if (!empty($permission)) {
        switch ($permission) {
        case 'r':
                $perm = "lecture";
            break;

        case 'rw':
                $perm = "ecriture";
            break;

        case 'rwx':
                $perm = "execution";
            break;
        }
        return $perm;
    } else {
        return false;
    }
}

function GetModulePerm()
{
    $modPerm = array();
    foreach (GetAllModules() as $item) {
        array_push($modPerm, $item['nom_module'].'-'.unShortenPerm($item['permissions_module']). '-'. 'on');
    }
    
    return $modPerm;
}
