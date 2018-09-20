<?php
function GetAllGroups()
{
    $groupArry = json_decode(file_get_contents(LOCALE . "groupes.json"), true);
    return $groupArry;
}

function GetAllGroupByName()
{
    $nameArray = array();
    $groupArry = GetAllGroups("groupes");
    $nb = 0;

    for ($i = 0; $i <= count($groupArry); $i++) {
        array_push($nameArray, $groupArry["groupes"][$nb]['name']);
        $nb++;
    }
    return $nameArray;
}


function createGroup($groupInfo= array())
{
    $groupInfo = func_get_args();
    $groupArray = array();

    if (isset($groupInfo)&& !empty($groupInfo)) {

        $source = file_get_contents(LOCALE. "groupes.json");
        $jsoArray = json_decode($source, true);

        if (!in_array($groupInfo[0], GetAllGroupByName())) {
            foreach ($groupInfo as $infos) {
                $group = array(
                    'name' => $infos[0],
                    'desc' => $infos[1],
                    'permission.modules' => addPermissions($infos[2]),
                    'dateCreation' => date("Y-m-d H:i:s"),
                    'idCreator' => $infos[3]
                );
            }
            
            array_push($group, $jsoArray['groupes']);
            $arrJso = json_encode($jsoArray['groupes']);
            file_put_contents(LOCALE. "groupes.json", $arrJso);

            return "done";

        } else {
            return $groupInfo[0] . ' group already exist';
        }
    }

};


/**
 * Add Permissions Per Modules
 *
 * @param array $newArry 
 * 
 * @return void
 */
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

/**
 * Shorten Permissions
 *
 * @param string $permission
 * 
 * @return void
 */
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
