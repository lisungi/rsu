<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function GetSite($id){
    
    $req=Query("SELECT * FROM `site` WHERE `id`='$id' LIMIT 1");
    if(isset($req[0])) {
        return $req[0];       
    }else return false;
}

function AddSite($title, $intro, $url, $lang){
    
    global $DB;
     
    $DB->exec("INSERT INTO `site` (`id` ,`name` ,`intro` ,`url`,`lang`)
                  VALUES (NULL , $title, $intro,'$url','$lang')");
    return $DB->lastInsertId();

    
}

function GetSites(){
    
    return Query("SELECT * FROM `site` ORDER BY `id` ASC ");
 
}