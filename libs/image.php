<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function AddImage($site,$author, $name, $info, $original, $large,$medium,$small,$thumb,$copyright=""){
    
    global $DB;
    $name=$DB->quote($name);
    $info=$DB->quote($info);
    $copyright=$DB->quote($copyright);
    $DB->exec("INSERT INTO `image` (`id` ,`siteid` ,`userid` ,`original` ,`large` ,`medium`  ,`small` ,`thumb` ,`name` ,`intro` ,`copyright`)
                  VALUES (NULL , '$site','$author', '$original', '$large', '$medium', '$small', '$thumb',$name,$info,$copyright)");
    
    return $DB->lastInsertId(); 
 
    
}


function EditImage($id, $site , $name,  $info,$copyright){
    
    global $DB;
    $name=$DB->quote($name);
    $info=$DB->quote($info);
    $copyright=$DB->quote($copyright); 
    return $DB->exec("UPDATE `image` SET  `name`=$name ,`intro`=$info,`copyright`=$copyright  WHERE `id`='$id' AND `siteid`='$site'");
 
    
}



function GetImage($id){
    
    $req=Query("SELECT * FROM `image` WHERE `id`='$id'");
    if(isset($req[0])) {
        return $req[0];       
    }else return false;
}

function GetSiteImage($site, $count=false,$page=1,$nbresult=NBRESULT){
    $offset=($page-1)*$nbresult;
    if($count){ $aa="count(*) as `nb` "; }else{$aa="*"; $limit=" LIMIT $offset, $nbresult";}
    return Query("SELECT $aa FROM `image` WHERE `siteid`='$site' ORDER BY `id`DESC $limit");
     
}


function DeleteImage($id,$site){
    global $DB;
    
    $Image=GetImage($id);
    
    if($Image[siteid]==$site){
        
        if($Image[original]<>"") @unlink (IMGDIR.$Image[original]);
        if($Image[large]<>"") @unlink (IMGDIR.$Image[large]); 
        if($Image[medium]<>"") @unlink (IMGDIR.$Image[medium]); 
        if($Image[small]<>"") @unlink (IMGDIR.$Image[small]); 
       if($Image[thumb]<>"") @unlink (IMGDIR.$Image[thumb]); 
       
       return $DB->exec("DELETE FROM `image` WHERE `id`='$id' AND `siteid`='$site'");
                                            
    }else return false;
}
