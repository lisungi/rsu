<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function showDebug($t,$p=false){
    if($p) echo "<pre>";
         print_r($t);
    if($p) echo "</pre>";
}

function e($key){ 
    global $_locales;
    $k=strtolower($key);
    if(array_key_exists($k, $_locales)) return $_locales[$k];
   
}

function GoBack(){
    Header ("Location: ".$_SERVER['HTTP_REFERER']);
    exit;
}

function GoHome($url=""){
    Header ("Location: ".WEBROOT.$url);
    exit;
}


function GetPath(){
    //$url=  str_replace(NDD."/", "", strtolower($_SERVER[REQUEST_URI]));
    //showDebug($_SERVER,true);
    $url = strtolower(substr($_SERVER['REQUEST_URI'], 1));
    // showDebug(explode("/",$url),true);
    $purl = explode("/", $url);
    // return explode("/", $url);
    // showDebug(explode("-",$purl[1]));
    return explode("-", $purl[1]);
}

function GetPage(){
    return GetPath()[0];
}

function GetSubPage(){
    return GetPath()[1];
}

function GetSubSubPage(){
    return GetPath()[2];
}

function GetCommandPage(){
    return GetPath()[3];
}

function GetSubCommandPage(){
    return GetPath()[4];
}

function GetSubSubCommandPage(){
    return GetPath()[5];
}

function isAdmin(\Delight\Auth\Auth $auth) {
    return $auth->hasAnyRole(
        \Delight\Auth\Role::SUPER_ADMIN
    );
}

function isModerator(\Delight\Auth\Auth $auth) {
    return $auth->hasAnyRole(
        \Delight\Auth\Role::ADMIN,
        \Delight\Auth\Role::MODERATOR
    );
}

function Query($req){
    global $DB;
    
    $sth=$DB->prepare($req);
    $sth->execute();
    $result=$sth->fetchAll(PDO::FETCH_ASSOC);
    
    return $result; 
}

function GetSlug($slug,$site){
    
    $req=Query("SELECT * FROM `slug_list` WHERE `slug`='$slug' AND `siteid`='$site' LIMIT 1");
    if(isset($req[0])) {
        return $req[0];       
    }else return false;
}


function AddSlug($site, $slug, $type, $id){
    
    global $DB;
 
    $DB->exec("INSERT INTO `slug_list` (`id` ,`slug` ,`type`,`typeid` ,`siteid`)
                  VALUES (NULL , '$slug','$type', '$id','$site')");
    return $DB->lastInsertId();
 
    
}


function EditSlug($site, $slug, $type, $id){
    
    global $DB;
    
    return $DB->exec("UPDATE `slug_list` SET  `slug`='$slug'  WHERE `type`='$type' AND  `typeid`='$id' AND `siteid`='$site'");

    
}


function DeleteSlug($site, $slug, $type, $id){
    
    global $DB; 
    return $DB->exec("DELETE FROM `slug_list` WHERE  `slug`='$slug' AND  `type`='$type' AND  `typeid`='$id' AND `siteid`='$site'");

    
}

function PageVisit($slug){
    
    global $DB;
    
    $jour=date("Y-m-d");
    $semaine=date("W");
    $an=date("Y");
    $user_ip=$_SERVER['REMOTE_ADDR'];
    $req1=Query("SELECT * FROM `pagevisit` WHERE `slug`='$slug' AND `userip`='$user_ip' LIMIT 1");
    $req2=Query("SELECT * FROM `pagevisit` WHERE `slug`='$slug' AND `userip`='$user_ip'  AND `jour`='$jour' LIMIT 1");
    $req3=Query("SELECT * FROM `pageview` WHERE `slug`='$slug' AND `semaine`='$semaine' AND `an`='$an' LIMIT 1");
    
    if(!isset($req2[0])) { // principe un personne, une visite par jour
        
        $DB->exec("INSERT INTO `pagevisit` (`id` ,`slug` ,`userip`,`jour`)
                      VALUES (NULL , '$slug','$user_ip', '$jour')"); 
    }
    
    if(!isset($req3[0])) {
        
        $DB->exec("INSERT INTO `pageview` (`id` ,`slug` ,`view`,`semaine` ,`an`)
                      VALUES (NULL , '$slug','1' , '$semaine','$an')"); 
    } else if(!isset($req1[0])) { // principe un personne, une vue
       $DB->exec("UPDATE `pageview` SET  `view`= `view`+1  WHERE `slug`='$slug' AND `semaine`='$semaine' AND `an`='$an'");
    }
 
    
}

function PageView($slug){
    $req=Query("SELECT SUM(`view`) as `view` FROM `pageview` WHERE `slug`='$slug' GROUP BY `slug`");
    return (int) $req[0][view];
}


function TopPage($nbl=10){
    $semaine=date("W");
    $an=date("Y");
    return Query("SELECT * FROM `article` WHERE `slug` IN  (SELECT `slug` FROM `pageview` WHERE `semaine`='$semaine' AND `an`='$an' ORDER BY `view` DESC) LIMIT $nbl"); 
}



function TrendingPage($nbl=10){
    $semaine=date("W");
    $an=date("Y");
    return Query("SELECT * FROM `article` WHERE `slug` IN  (SELECT `slug`  FROM `pageview` WHERE `semaine`='$semaine' AND `an`='$an' ORDER BY `view` DESC) LIMIT $nbl,$nbl");
}


function stopWords($text, $stopwords) {
  // Remove line breaks and spaces from stopwords
  $stopwords = array_map(function($x){return trim(strtolower($x));}, $stopwords);
  // Replace all non-word chars with comma
  $pattern = '/[0-9\W]/';
  $text = preg_replace($pattern, ',', $text);
  // Create an array from $text
  $text_array = explode(",",$text);
  // remove whitespace and lowercase words in $text
  $text_array = array_map(function($x){return trim(strtolower($x));}, $text_array);
  foreach ($text_array as $term) {
    if (!in_array($term, $stopwords)) {
      $keywords[] = $term;
    }
  };
  return array_filter($keywords);
}


function cleanString($in,$offset=null) 
{ 
    $out = trim($in); 
    if (!empty($out)) 
    { 
        $entity_start = strpos($out,'&',$offset); 
        if ($entity_start === false) 
        { 
            // ideal 
            return $out;    
        } 
        else 
        { 
            $entity_end = strpos($out,';',$entity_start); 
            if ($entity_end === false) 
            { 
                 return $out; 
            } 
            // zu lang um eine entity zu sein 
            else if ($entity_end > $entity_start+7) 
            { 
                 // und weiter gehts 
                 $out = cleanString($out,$entity_start+1); 
            } 
            // gottcha! 
            else 
            { 
                 $clean = substr($out,0,$entity_start); 
                 $subst = substr($out,$entity_start+1,1); 
                 // &scaron; => "s" / &#353; => "_" 
                 $clean .= ($subst != "#") ? $subst : "_"; 
                 $clean .= substr($out,$entity_end+1); 
                 // und weiter gehts 
                 $out = cleanString($clean,$entity_start+1); 
            } 
        } 
    } 
    return $out; 
}  


