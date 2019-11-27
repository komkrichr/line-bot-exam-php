<?php
$access_token = 'iDajrSSMIRGaGQgv3AbuFaKHlDH6fU35m216/2T0Bb9MX/egR0Mm4ZrkTmUGeHqA1CM/h1AxwrVjrKItQc0kpqXjnRyieff+4iIKR+XSglOaSRnSloWn8arnI3LQxZy9KFfLArzYYf85Lvq6ZLISIwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
