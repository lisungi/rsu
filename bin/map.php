<?php
$locElts = array();

foreach ($_POST as $key => $value) {
    if ($key != 'submitMap') {
        $locElt = htmlspecialchars($value);
        array_push($locElts, $locElt);
    }
}

var_dump($locElts);