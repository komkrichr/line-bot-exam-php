<?php
$url = 'http://43.254.133.192/raid/ar1.asp';
//$url = 'https://pantip.com';
$myvars = 'txtRaid=' . 'Wannasorn/15.00'  ;
$ch = curl_init( $url );
$headers = ['Content-Type' => 'application/x-www-form-urlencoded', 'charset' => 'windows-874'];
curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt( $ch, CURLOPT_HEADER, $headers);
curl_setopt( $ch, CURLOPT_ENCODING, 'windows-874');
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);				
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec( $ch );
echo $url;
echo '<br>';
echo 'GoRaid VG1-8';
?>
