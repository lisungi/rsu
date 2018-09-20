<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function AddCategory($site,$parent, $name,$slug, $info){
    
    global $DB;
    $name=$DB->quote($name);
    $info=$DB->quote($info);
    $DB->exec("INSERT INTO `category` (`id` ,`siteid` ,`parent` ,`name` ,`slug`,`info`)
                  VALUES (NULL , '$site','$parent',$name, '$slug',$info)");
    
    $id=$DB->lastInsertId();
    if($id)AddSlug($site,$slug, "cat", $id);
    return $id;
 
    
}


function EditCategory($id, $site,$parent, $name,$slug, $info){
    
    global $DB;
    $name=$DB->quote($name);
    $info=$DB->quote($info);
    EditSlug($site,$slug, "cat", $id);
    return $DB->exec("UPDATE `category` SET  `parent`=$parent,  `name`=$name  ,`info`=$info ,`slug`='$slug' WHERE `id`='$id' AND `siteid`='$site'");
 
    
}



function GetCategory($id){
    
    $req=Query("SELECT * FROM `category` WHERE `id`='$id'");
    if(isset($req[0])) {
        return $req[0];       
    }else return false;
}


function GetCategoryBySlug($id){
    
    $req=Query("SELECT * FROM `category` WHERE `slug`='$id'");
    if(isset($req[0])) {
        return $req[0];       
    }else return false;
}

function GetSiteCategory($site, $count=false,$page=1,$nbresult=NBRESULT){
        $offset=($page-1)*$nbresult;
    
     if($count){ $aa="count(*) as `nb` "; }else{$aa="*"; $limit=" LIMIT $offset, $nbresult";}
    return Query("SELECT $aa FROM `category` WHERE `siteid`='$site' $limit");
     
}

function GetChildrenCategory($site, $id){
    
   return Query("SELECT `id` , `parent` ,`name` ,`slug`,`info` FROM `category` WHERE `siteid`='$site' AND `parent`='$id' ORDER BY `name` ASC");
     
}


function AddPerso($site,$name,$slug,$intro, $image,$country, $type){
    
    global $DB;
    $name=$DB->quote($name);
    $intro=$DB->quote($intro);
    
    
    $DB->exec("INSERT INTO `perso` (`id` ,`siteid` ,`name` ,`slug`,`intro` ,`image` ,`country`,`type`)
                  VALUES (NULL , '$site',$name,'$slug', $intro,'$image', '$country','$type')");

    return $DB->lastInsertId();
 
    
}

function EditPerso($id, $site,$name,$intro, $image,$country, $type){
    
    global $DB;
    $name=$DB->quote($name);
    $intro=$DB->quote($intro);
    if($image<>"") $img1=" `image`='$image',  ";
    
    return $DB->exec("UPDATE `perso` SET  `name`=$name, $img1 `intro`=$intro ,`country`='$country' ,`type`='$type' WHERE `id`='$id' AND `siteid`='$site'");
 
    
}



function GetPerso($id){
    
    $req=Query("SELECT * FROM `perso` WHERE `id`='$id'");
    if(isset($req[0])) {
        return $req[0];       
    }else return false;
}


function GetPersoBySlug($id){
    
    $req=Query("SELECT * FROM `perso` WHERE `slug`='$id'");
    if(isset($req[0])) {
        return $req[0];       
    }else return false;
}

function GetSitePerso($site, $count=false,$page=1,$nbresult=NBRESULT){
        $offset=($page-1)*$nbresult;
     if($count){ $aa="count(*) as `nb` "; }else{$aa="*"; $limit=" LIMIT $offset, $nbresult";}
    return Query("SELECT $aa  FROM `perso` WHERE `siteid`='$site' ORDER BY `name` ASC $limit");
     
}

function AddEntitie($site,$name,$slug,$intro, $image,$country, $type){
    
    global $DB;
    $name=$DB->quote($name);
    $intro=$DB->quote($intro);
    
    
    $DB->exec("INSERT INTO `entitie` (`id` ,`siteid` ,`name` ,`slug`,`intro` ,`image` ,`country`,`type`)
                  VALUES (NULL , '$site',$name,'$slug', $intro,'$image', '$country','$type')");

    return $DB->lastInsertId();
 
    
}



function EditEntitie($id, $site,$name,$intro, $image,$country, $type){
    
    global $DB;
    $name=$DB->quote($name);
    $intro=$DB->quote($intro);
    if($image<>"") $img1=" `image`='$image',  ";
    
    return $DB->exec("UPDATE `entitie` SET  `name`=$name, $img1 `intro`=$intro ,`country`='$country' ,`type`='$type' WHERE `id`='$id' AND `siteid`='$site'");
 
    
}


function GetEntitie($id){
    
    $req=Query("SELECT * FROM `entitie` WHERE `id`='$id'");
    if(isset($req[0])) {
        return $req[0];       
    }else return false;
}

function GetEntitieBySlug($id){
    
    $req=Query("SELECT * FROM `entitie` WHERE `slug`='$id'");
    if(isset($req[0])) {
        return $req[0];       
    }else return false;
}

function GetSiteEntitie($site, $count=false,$page=1,$nbresult=NBRESULT){
        $offset=($page-1)*$nbresult;
     if($count){ $aa="count(*) as `nb` "; }else{$aa="*"; $limit=" LIMIT $offset, $nbresult";}
    return Query("SELECT $aa  FROM `entitie` WHERE `siteid`='$site' ORDER BY `name` ASC $limit");
     
}

function AddSubject($site,$name,$title,$slug,$intro, $image1,$image2, $active){
    
    global $DB;
    $name=$DB->quote($name);
    $title=$DB->quote($title);
    $intro=$DB->quote($intro);
    
    
    $DB->exec("INSERT INTO `subject` (`id` ,`siteid` ,`name` ,`title` ,`intro` ,`slug`,`image1` ,`image2`,`active`)
                  VALUES (NULL , '$site',$name,$title, $intro,'$slug','$image1', '$image2','$active')");

   $id=$DB->lastInsertId();
    if($id)AddSlug($site,$slug, "subject", $id);
    return $id;
 
    
}


function EditSubject($id, $site,$name,$title,$slug,$intro, $image1,$image2, $active){
    
    global $DB;
    $name=$DB->quote($name);
    $title=$DB->quote($title);
    $intro=$DB->quote($intro);
    
    if($image1<>"") $img1=" `image1`='$image1',  ";
    if($image2<>"") $img2=" `image2`='$image2'  ,";
    
    EditSlug($site,$slug, "subject", $id);
    return $DB->exec("UPDATE `subject` SET  `name`=$name,  `title`=$title, $img1 $img2 `intro`=$intro ,`slug`='$slug' ,`active`='$active' WHERE `id`='$id' AND `siteid`='$site'");

    
}


function GetSubject($id){
    
    $req=Query("SELECT * FROM `subject` WHERE `id`='$id'");
    if(isset($req[0])) {
        return $req[0];       
    }else return false;
}

function GetSiteSubject($site, $count=false,$page=1,$nbresult=NBRESULT){
        $offset=($page-1)*$nbresult;
     if($count){ $aa="count(*) as `nb` "; }else{$aa="*"; $limit=" LIMIT $offset, $nbresult";}
    return Query("SELECT $aa FROM `subject` WHERE `siteid`='$site' $limit");
     
}


function GetSiteLastSubject($site){
    
    return Query("SELECT *  FROM `subject` WHERE `siteid`='$site' ORDER BY `id` DESC LIMIT 10");
     
}


function GetSiteLastActiveSubject($site){
    
    return Query("SELECT *  FROM `subject` WHERE `siteid`='$site' AND `active`='y'  ORDER BY `id` DESC LIMIT 10");
     
}


function AddTag($site,$name,$slug){
    
    if($name=="" || $slug=="") return false;
    
    global $DB;
    $name=$DB->quote($name); 
    
    $exist=GetTagBySlug($site, $slug);
     
    if(!$exist){
        $DB->exec("INSERT INTO `tag` (`id` ,`siteid` ,`name`,`slug`)
                      VALUES (NULL , '$site',$name,'$slug')");

        return $DB->lastInsertId();
    }else{
        return $exist[id];
    }
    
}


function GetTag($id){
    
    $req=Query("SELECT * FROM `tag` WHERE `id`='$id'");
    if(isset($req[0])) {
        return $req[0];       
    }else return false;
}

function GetTagByName($id){
    
    $req=Query("SELECT * FROM `tag` WHERE `slug`='$id'");
    if(isset($req[0])) {
        return $req[0];       
    }else return false;
}


function GetTagBySlug($site, $name){
    
    $req=Query("SELECT * FROM `tag` WHERE `siteid`='$site' AND `slug`='$name'");
    if(isset($req[0])) {
        return $req[0];       
    }else return false;
}

function GetSiteTag($site, $count=false,$page=1,$nbresult=NBRESULT){
        $offset=($page-1)*$nbresult;
     if($count){ $aa="count(*) as `nb` "; }else{$aa="*"; $limit=" LIMIT $offset, $nbresult";}
    return Query("SELECT $aa  FROM `tag` WHERE `siteid`='$site' ORDER BY `name` ASC $limit");
     
}


function AddMenu($site,$zone,$type,$id){ 
    global $DB; 
      
    $DB->exec("INSERT INTO `menu` (`id` ,`siteid` ,`zone`,`type`,`typeid`)
                  VALUES (NULL , '$site', '$zone', '$type', '$id')");

    return $DB->lastInsertId(); 
    
}

function EditMenu($id, $site,$position){
    
    global $DB; 
    return $DB->exec("UPDATE `menu` SET  `position`='$position' WHERE `id`='$id' AND `siteid`='$site'");

    
}

function GetMenu($site, $zone){
    
    return Query("SELECT * FROM `menu` WHERE `zone`='$zone' AND `siteid`='$site' ORDER BY 'position' ASC");
    
}


function DeleteMenu($id,$site){ 
    
    global $DB;  
     
    return $DB->exec("DELETE FROM `menu` WHERE `id`='$id' AND `siteid`='$site'");

 
    
}