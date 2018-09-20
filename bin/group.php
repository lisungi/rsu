<?php
$modPerm = array();
$group= array();
$id = $auth->getUserId();

if ($_POST['ugroup'] <> "" && $_POST['descgroup'] <> "") {
    array_push($group, $_POST['ugroup']);
    array_push($group, $_POST['descgroup']);

    foreach ($_POST as $key => $value) {
        if ($key != 'ugroup' && $key != 'descgroup' && $key != 'submitGroup') {
            $modperm = htmlspecialchars($key) . '-' . htmlspecialchars($value);
            array_push($modPerm, $modperm);
        }
    }

    $thisArray[0] = $modPerm;
    $groupInfo = array_merge($group, $thisArray);
    array_push($groupInfo, $id);


    // var_dump(createGroup($groupInfo)));
}

// var_dump($groupInfo);
var_dump(GetAllGroups());