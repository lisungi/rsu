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
    $msg = ''; 

    if (GetModule($moduleName)) {
        foreach (GetModule($moduleName) as $item) {
            $msg .= $item['nom_module']. ' existe déjà ';
        }
        return $msg;
    } else {
        $DB->exec(
            "INSERT INTO `modules` (`id`, `nom_module`, `permissions_module`, `creation_date`) 
                    VALUES (NULL, '$moduleName', 'test', now())"
        );
        return $DB->lastInsertId();
    }
}

function setDefaultModPerm()
{
    
}