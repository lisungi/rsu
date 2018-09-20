<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function AddArticle($site,$author,$name,$slug,$content, $intro, $image,$cat, $tag, $pero, $entite, $subject, $info, $type, $statut, $time){
    
    global $DB;
    $name=$DB->quote($name);
    $intro=$DB->quote($intro);
    $content=$DB->quote($content);
    
    
    $DB->exec("INSERT INTO `article` (`id` ,`userid` ,`siteid` ,`title`,`slug`, `image` ,`content` ,`intro` ,`cat` ,`tag`,`perso` ,`entitie` ,`subject` ,  `info` ,`type`,`statut`,`dtime`)
                  VALUES (NULL , '$author','$site',$name,'$slug','$image',$content, $intro, '$cat','$tag', '$pero','$entite','$subject','$info', '$type','$statut','$time')");

    $id=$DB->lastInsertId();
    if($id)AddSlug($site,$slug, "article", $id);
    return $id;
 
    
}


function GetArticle($id,$champs="*"){
    
    $req=Query("SELECT $champs FROM `article` WHERE `id`='$id'");
    if(isset($req[0])) {
        return $req[0];       
    }else return false;
}

function GetSiteArticle($site, $count=false,$page=1,$nbresult=NBRESULT){
        $offset=($page-1)*$nbresult;
     if($count){ $aa="count(*) as `nb` "; }else{$aa="*"; $limit=" LIMIT $offset, $nbresult";}
    return Query("SELECT $aa  FROM `article` WHERE `siteid`='$site'  AND `statut`<>'delete' ORDER BY `id` DESC $limit");
     
}

function GetSiteArticles($site, $count=false,$page=1,$nbresult=NBRESULT,$exclude=""){
        $offset=($page-1)*$nbresult;
        if($exclude<>"")  $tal="AND ID NOT IN ($exclude)";
     if($count){ $aa="count(*) as `nb` "; }else{$aa="*"; $limit=" LIMIT $offset, $nbresult";}
    return Query("SELECT $aa  FROM `article` WHERE `siteid`='$site'  AND `statut`='publish' $tal ORDER BY `dtime` DESC $limit");
     
}

function GetSitePages($site, $count=false,$page=1,$nbresult=NBRESULT){
        $offset=($page-1)*$nbresult;
     if($count){ $aa="count(*) as `nb` "; }else{$aa="*"; $limit=" LIMIT $offset, $nbresult";}
    return Query("SELECT $aa  FROM `article` WHERE `siteid`='$site'  AND  `type`='page'  AND `statut`='publish' ORDER BY `dtime` DESC $limit");
     
}

function GetSiteArticleTrash($site, $count=false,$page=1,$nbresult=NBRESULT){
        $offset=($page-1)*$nbresult;
     if($count){ $aa="count(*) as `nb` "; }else{$aa="*"; $limit=" LIMIT $offset, $nbresult";}
    
    return Query("SELECT $aa  FROM `article` WHERE `siteid`='$site'  AND `statut`='delete' ORDER BY `id` DESC $limit");
     
}

function EditArticle($id,$author,$name,$content, $intro, $image,$cat, $tag, $pero, $entite, $subject, $info, $type, $statut, $time){
    
    global $DB;
    $name=$DB->quote($name);
    $intro=$DB->quote($intro);
    $content=$DB->quote($content);
    if($image1<>"") $img1=" `image`='$image',  ";
     
    return $DB->exec("UPDATE `article` SET  `title`=$name,  $img1 `content`=$content ,`intro`=$intro ,`cat`='$cat' ,`tag`='$tag',`perso`= '$pero' ,`entitie`='$entite' ,`subject`='$subject' ,  `info`='$info' ,`type` = '$type',`statut`='$statut',`modified`='$time' WHERE `id`='$id' AND `userid`='$author'");

 
    
}


function RemoveArticle($id,$site){ 
    
    global $DB;
     
    return $DB->exec("UPDATE `article` SET  `statut`='delete' WHERE `id`='$id' AND `siteid`='$site'");

    
}

function SaveArticle($id,$site){ 
    
    global $DB;
     
    return $DB->exec("UPDATE `article` SET  `statut`='draft' WHERE `id`='$id' AND `siteid`='$site'");

    
}

function DeleteArticle($id,$site){ 
    
    global $DB; 
    
    DeleteSlug($site, GetArticle($id)[slug], "article", $id);
     
    return $DB->exec("DELETE FROM `article` WHERE `id`='$id' AND `siteid`='$site'");

 
    
}

function SearchArticle($site, $type,$id, $count=false,$page=1,$nbresult=NBRESULT){
        $offset=($page-1)*$nbresult;
    
    switch($type){
        case "tag":
            $w="AND `tag` LIKE '%$id%'";
            break;
        case "subject":
            $w="AND `subject`='$id'";
            break;
        case "cat":
            $w="AND `cat` LIKE '%$id%'";
            break;
        case "perso":
            $w="AND `perso` LIKE '%$id%'";
            break;
        case "entitie":
            $w="AND `entitie` LIKE '%$id%'";
            break;
        case "author":
            $w="AND `userid`='$id'";
            break;
    }
    
    if($count){ $a="count(*) as `nb` "; }else{$a="*"; $limit=" LIMIT $offset, $nbresult";}
    
    return Query("SELECT $a  FROM `article` WHERE `siteid`='$site' $w AND `statut`<>'delete'  ORDER BY `id` DESC $limit");
    
}
function SearchArticles($site, $type,$id, $count=false,$page=1,$nbresult=NBRESULT,$exclude=""){
        $offset=($page-1)*$nbresult;
        $tal="";
        if($exclude<>"")  $tal="AND ID NOT IN ($exclude)";
    
    switch($type){
        case "tag":
            $w="AND `tag` LIKE '%$id%'";
            break;
        case "subject":
            $w="AND `subject`='$id'";
            break;
        case "cat":
            $w="AND `cat` LIKE '%$id%'";
            break;
        case "perso":
            $w="AND `perso` LIKE '%$id%'";
            break;
        case "entitie":
            $w="AND `entitie` LIKE '%$id%'";
            break;
        case "author":
            $w="AND `userid`='$id'";
            break;
    }
    
    if($count){ $a="count(*) as `nb` "; }else{$a="*"; $limit=" LIMIT $offset, $nbresult";}
    
    return Query("SELECT $a  FROM `article` WHERE `siteid`='$site' $w AND `statut`='publish' $tal  ORDER BY `dtime` DESC $limit");
    
}

