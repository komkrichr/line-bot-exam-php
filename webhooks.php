<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'D72+jpfVSwYVT6aMhV4iWkotVP+RN08p0pslpXb4d7sKiNxPZeZ3nNIUoavXY7Ix1CM/h1AxwrVjrKItQc0kpqXjnRyieff+4iIKR+XSglPUas6F2BsDP3mRt9hyNN1iWNPF6sqBt9ayF4YXogZC3AdB04t89/1O/w1cDnyilFU=';
$msg_reply='';
	
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['source']['userId'];
			$msg_reply = $event['message']['text'];
			if ((strpos($msg_reply, 'lo/') !== false) || (strpos($msg_reply, 'Lo/') !== false) || (strpos($msg_reply, 'LO/') !== false)) {
				$msg_reply='send location';
			
				// Get replyToken
				$replyToken = $event['replyToken'];

				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => $msg_reply 
				];
				//Save Location
				$url = 'http://http://43.254.133.192/raid/ar.asp';
				$myvars = 'txtRaid=' . $msg_reply . '&AppMode=';

				$ch = curl_init( $url );
				curl_setopt( $ch, CURLOPT_POST, 1);
				curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
				curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt( $ch, CURLOPT_HEADER, 0);
				curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

				$response = curl_exec( $ch );
				
				// Make a POST Request to Messaging API to reply to sender
				$url = 'https://api.line.me/v2/bot/message/reply';
					$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
				$post = json_encode($data);
				$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				$result = curl_exec($ch);
				curl_close($ch);
			//}
			echo $result . "\r\n";
		     }		
		}
	}
}

echo "OK8";
