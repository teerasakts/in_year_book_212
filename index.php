<?php
	/*Get Data From POST Http Request*/
	$datas = file_get_contents('php://input');
	/*Decode Json From LINE Data Body*/
	$deCode = json_decode($datas,true);
	file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);
	$replyToken = $deCode['events'][0]['replyToken'];
	$messages = [];
	$messages['replyToken'] = $replyToken;
  $userid = $deCode['events'][0]['source'];
	$messages['messages'][0] = getFormatTextMessage("เอ้ย ถามอะไรก็ตอบได้"."aaaa");
	$encodeJson = json_encode($messages);
	$LINEDatas['url'] = "https://api.line.me/v2/bot/message/reply";
  	$LINEDatas['token'] = "T1N5OCuPWkub1DJ/BDd9bqdciejruZeC47EKS7R1Q2za6QBj1a9P+Y+z+fZqNjk3cBOyWfaC0DSySI1T23nwoBcteCI8CIqiECWwkYg1fNR3qkAElfXfJPIaKVRXmLLses8+9ywyQAv33Pz19QsDuAdB04t89/1O/w1cDnyilFU=";
  	$results = sentMessage($encodeJson,$LINEDatas);
	/*Return HTTP Request 200*/
	http_response_code(200);
	function getFormatTextMessage($text)
	{
		$datas = [];
		$datas['type'] = 'text';
		$datas['text'] = $text;
		return $datas;
	}
	function sentMessage($encodeJson,$datas)
	{
		$datasReturn = [];
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $datas['url'],
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $encodeJson,
		  CURLOPT_HTTPHEADER => array(
		    "authorization: Bearer ".$datas['token'],
		    "cache-control: no-cache",
		    "content-type: application/json; charset=UTF-8",
		  ),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		    $datasReturn['result'] = 'E';
		    $datasReturn['message'] = $err;
		} else {
		    if($response == "{}"){
			$datasReturn['result'] = 'S';
			$datasReturn['message'] = 'Success';
		    }else{
			$datasReturn['result'] = 'E';
			$datasReturn['message'] = $response;
		    }
		}
		return $datasReturn;
	}
?>
