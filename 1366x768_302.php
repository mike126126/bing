<?php
$url = "https://cn.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1&mkt=zh-CN";
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$headers = array(
   "Accept: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$resp = curl_exec($curl);
curl_close($curl);
//var_dump($resp);
$array = json_decode($resp);
$imgurl = 'https://cn.bing.com'.$array->{"images"}[0]->{"urlbase"}.'_1366x768.jpg';
if($imgurl){
		header('Location: '.$imgurl); 
		exit(); 
} else {     
     exit('error'); 
}
?>