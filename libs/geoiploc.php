<?php
 


function GetCountryCode($ip=""){
    
    if (isset($_SESSION["country"]))  return $_SESSION["country"];
    if($ip=="") $ip=$_SERVER['REMOTE_ADDR'];
    $dataArray = json_decode(@file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip),true);
    
    if(isset($dataArray[geoplugin_countryCode])){
    $_SESSION["country"]=$dataArray[geoplugin_countryCode];
        return $dataArray[geoplugin_countryCode];
    } else return "";
    
}