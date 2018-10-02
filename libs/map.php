<?php
function AddLocation($type, $mid, $masah, $nom, $abbr, $obs, $parentId = '')
{
    $location = func_get_args();
    
    $parent = $location[count($location)];

    if (!empty($parent)) {
        return "else";
    } else {
    //         $DB->exec(
    //             " INSERT INTO `localisations` (`id`, `parent_id`, `type`,
    //             `code_mid`, `code_masah`, `nom`, `abbreviation`,
    //             `observations`,`creation_date`,`code_localisation`)
    // VALUES(null, null, '$type', 
    // '$mid', '$masah', '$nom', '$abbr', 
    // '$obs', now(), null)"
    //         );
        return $parent;
    }
}

function GetLocId($parentName)
{
    $container = array();

    $parentId = 0;
    $parentTitle = strtolower($parentName);

    if (!empty($parentTitle)) {
        foreach (GetLocJSO() as $item) {
            array_push($container, $item['id'] .'_'. strtolower($item['nom']) . '_' . $item['parent_id']);
        }
        
        foreach ($container as $key => $value) {
            $val = explode("_", $value);
            if ($parentTitle == $val[1]) {
                $parentId = $val[0];
            }
        }
        return $parentId;
    } else {
        return false ;
    }
}

function GetAllLoc()
{
    $req = Query("SELECT * FROM `localisations` ");
    $locArray = array();

    if (isset($req)) {
        SetRecentLocFile($req);
        return true;
    } else {
        return false;
    }
}

function GetLocJSO()
{
        $jsoArray = array();
        $searched = array();

        $currentJso = file_get_contents(LOCALE . 'locations/'.'locations_' . GetRecentLocFile() . '.json');
        $jsoArray = json_decode($currentJso, true);

        foreach ($jsoArray as $item) {
            array_push($searched, $item);
        }
        
        return $searched;
}

function GetLocElt($elt)
{
        $jsoArray = array();
        $elts = array();

        $currentJso = file_get_contents(LOCALE . 'locations/'.'locations_' . GetRecentLocFile() . '.json');
        $jsoArray = json_decode($currentJso, true);

        foreach ($jsoArray as $item) {
            array_push($elts, $item[$elt]);
        }

        return  $elts;
}


function ListTypes()
{   
    $types = GetLocElt('type');
    $comparator = array();

    echo '<select class ="custom-select" name = "utype" >';
    foreach ($types as $key => $value) {
        if (!in_array($value, $comparator)) {
            array_push($comparator, $value);
        }
    }
    
    foreach ($comparator as $key => $value) {
        echo '<option>' . $value . '</option>';
    }
    echo '</select>';
}

function GetRecentLocFile()
{
    $fileName = array();
    $fileOrder = array();


    $path = LOCALE .'/locations/';
    if ($handle = opendir($path)) {
        while (false !== ($file = readdir($handle))) {
            if ('.' === $file) continue;
            if ('..' === $file) continue;
            array_push($fileName, $file);
        }
        closedir($handle);
    }

    foreach ($fileName as $key => $value) {
        $cuter = explode('_', $value);
        array_push($fileOrder, (int)substr($cuter[1], 0, -5));
    }

    sort($fileOrder);

    // return 'locations_'.$fileOrder[count($fileOrder)-1].'.json';
    return $fileOrder[count($fileOrder) - 1];
}

function SetRecentLocFile($locArray=array())
{
    $path = LOCALE . 'locations/'; 
    $j = GetRecentLocFile(); 
    $j++; 
    $path .= 'locations_' . $j. '.json';
    $jsoArray = array();

    if (!file_exists($path)) {
        $handle = fopen($path, "x+");
        $jsoArray = json_encode($locArray, true);
        fwrite($handle, $jsoArray);
        fclose($handle);
        // return $path;
        // return $jsoArray;
    } else {
        return false;
    }  
}