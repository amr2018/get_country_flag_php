<?php

function getIPAddress() {  
        
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
    }  
       
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
        
    else{
    	$ip = $_SERVER['REMOTE_ADDR'];
    }  
    return $ip;
}  


function getIpinfo() {
    $ip = getIPAddress();
    $ipinfo = json_decode(file_get_contents('http://ipinfo.io'));
    return $ipinfo;
}

function getContryFlag() {
	$ipinfo = getIpinfo();
	$contryCode = strtolower($ipinfo->country);
    $flagImageSrc = 'https://ipdata.co/flags/'.$contryCode.'.png';
    echo "<img src=" . $flagImageSrc . " />";
}

getContryFlag();
