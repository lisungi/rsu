<?php
function GetModulePerm()
{
    $modArray = json_decode(file_get_contents(LOCALE . "modules.json"), true);
    return $modArray["modules"];
}
