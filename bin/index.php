<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require __DIR__ . '/../load.php';

//showDebug($_SERVER,true);
$commande = explode("=", $_SERVER['REDIRECT_QUERY_STRING']);
//showDebug($commande,true);
$fn = explode("/", $commande[1]);

//showDebug($fn,true);
$cmd = strtolower($fn[0]);
$binid = strtolower($fn[1]);

if ($cmd <> "") {
    $file = BINDIR . $cmd . ".php";
    
    if (file_exists($file)) require_once $file;
    else include THEME . "404.php";

} else {
    include THEME . "404.php";
}