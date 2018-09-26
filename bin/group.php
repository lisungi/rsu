<?php
$modPerm = array();
$id = $auth->getUserId();

if ($_POST['ugroup'] <> "" && $_POST['descgroup'] <> "") {

    foreach ($_POST as $key => $value) {
        if ($key != 'ugroup' && $key != 'descgroup' && $key != 'submitGroup') {
            $modperm = htmlspecialchars($key) . '-' . htmlspecialchars($value);
            array_push($modPerm, $modperm);
        }
    }
    
    AddGroup($_POST['ugroup'], $_POST['descgroup'], $modPerm);
}
// var_dump(GetAllGroups());
GoBack();

