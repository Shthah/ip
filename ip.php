
<?php include 'function.php';?>
<?php
$ip = $_SERVER["REMOTE_ADDR"];
$weekarray=array("日","一","二","三","四","五","六"); //先定义一个数组

$url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
$UserAgent = 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.0.04506; .NET CLR 3.5.21022; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_ENCODING, '');
curl_setopt($curl, CURLOPT_USERAGENT, $UserAgent);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
$data = curl_exec($curl);
$data = json_decode($data, true);
$country = $data['data']['country'];
$region = $data['data']['region'];
$city = $data['data']['city'];

echo '欢迎您来自'.$country.'-'.$region.'-'.$city.'的朋友'.'今天是'.date('Y年n月j日')."  星期".$weekarray[date("w")].'您的IP是:'.$ip.'您使用的是'.$os.'操作系统'.'您使用的是'.$bro.'浏览器';
?>