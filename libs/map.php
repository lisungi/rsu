<?php

function AddLocation($nameLoc, $abbr, $type, $parent='', $locArray=array())
{
    $location = func_get_args();

    if (!empty($parent)) {
        return "else";
    } else {
            $DB->exec(
                " INSERT INTO `localisations` (`id`, `parent_id`, `type`,
                `code_mid`, `code_masah`, `nom`, `abbreviation`,
                `observations`,`creation_date`,`code_localisation`)
    VALUES(null, null, '$type', 'DPT', 'DDAS', 
    '$title', 'BZV', 'DDAS de Brazzaville', now(), '')"
            );
        // return $locationId;
        return $location;

    }
    return $location;
}

function GetAllLoc()
{
    $req = Query("SELECT * FROM `localisations` ");
    if (isset($req)) {
        return $req;
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
            array_push($searched, $item['id']);
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
    $path = LOCALE . 'locations/'; $j = GetRecentLocFile(); $j++; $path .= 'locations_' . $j. '.json';
    $jsoArray = array();

    if (!file_exists($path)) {
        $handle = fopen($path, "x+");
        $jsoArray = json_encode($locArray, true);
        fwrite($handle, $jsoArray);
        fclose($handle);
        return $path;
        // return $jsoArray;
    } else {
        return false;
    }  
}