<?php
	/*Get Data From POST Http Request*/
	$datas = file_get_contents('php://input');
	/*Decode Json From LINE Data Body*/
	$deCode = json_decode($datas,true);
	file_put_contents('log.txt', file_get_contents('php://input') . PHP_EOL, FILE_APPEND);
	$replyToken = $deCode['events'][0]['replyToken'];
	$messages = [];
	$messages['replyToken'] = $replyToken;
  $userid = $deCode['events'][0]['message']['text'];
	$messages['messages'][0] = getFormatTextMessage("เอ้ย ถามอะไรก็ตอบได้"."aaaa".$userid);
	//$encodeJson = json_encode($messages);
  $encodeJson = json_encode($messages);
	$LINEDatas['url'] = "https://api.line.me/v2/bot/message/reply";
  	$LINEDatas['token'] = "T1N5OCuPWkub1DJ/BDd9bqdciejruZeC47EKS7R1Q2za6QBj1a9P+Y+z+fZqNjk3cBOyWfaC0DSySI1T23nwoBcteCI8CIqiECWwkYg1fNR3qkAElfXfJPIaKVRXmLLses8+9ywyQAv33Pz19QsDuAdB04t89/1O/w1cDnyilFU=";
  	$results = sentMessage($encodeJson,$LINEDatas);
	/*Return HTTP Request 200*/
	http_response_code(200);
	function getFormatTextMessage($text)
	{
		//$datas = [];
/*sssssssssssssssssssssssssssssssssssssssssssssssssssssssss*/
/*$datas = array (
  'type' => 'flex',
  'altText' => 'Flex Message',
  'contents' =>
  array (
    'type' => 'bubble',
    'direction' => 'ltr',
    'header' =>
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'contents' =>
      array (
        0 =>
        array (
          'type' => 'text',
          'text' => 'ร.ต.อ.สมชาย  มีสตางค์',
          'size' => 'xl',
          'align' => 'center',
          'gravity' => 'center',
          'color' => '#2216C3',
        ),
        1 =>
        array (
          'type' => 'separator',
          'margin' => 'sm',
        ),
        2 =>
        array (
          'type' => 'text',
          'text' => 'ชาย',
          'size' => 'lg',
          'align' => 'center',
          'color' => '#3D09DD',
        ),
      ),
    ),
    'body' =>
    array (
      'type' => 'box',
      'layout' => 'vertical',
      'spacing' => 'md',
      'margin' => 'lg',
      'contents' =>
      array (
        0 =>
        array (
          'type' => 'image',
          'url' => 'https://www.siamzone.com/music/news/2015/07381.jpg',
          'align' => 'center',
          'gravity' => 'center',
          'aspectRatio' => '9:16',
          'aspectMode' => 'cover',
          'backgroundColor' => '#471E1E',
        ),
        1 =>
        array (
          'type' => 'separator',
        ),
        2 =>
        array (
          'type' => 'box',
          'layout' => 'horizontal',
          'contents' =>
          array (
            0 =>
            array (
              'type' => 'text',
              'text' => 'รอง สว.ฝอ.ภ.จว.ชลบุรี',
              'size' => 'xl',
              'align' => 'center',
              'gravity' => 'center',
              'color' => '#1A4CE8',
            ),
          ),
        ),
        3 =>
        array (
          'type' => 'box',
          'layout' => 'horizontal',
          'flex' => 3,
          'margin' => 'xl',
          'contents' =>
          array (
            0 =>
            array (
              'type' => 'text',
              'text' => '08-1087-5332',
              'align' => 'center',
              'gravity' => 'center',
              'weight' => 'bold',
              'color' => '#DD1919',
            ),
            1 =>
            array (
              'type' => 'button',
              'action' =>
              array (
                'type' => 'uri',
                'label' => 'CALL',
                'uri' => 'https://linecorp.com',
              ),
              'style' => 'primary',
              'gravity' => 'center',
            ),
          ),
        ),
      ),
    ),
  ),
);*/
/*sssssssssssssssssssssssssssssssssssssssssssssssssssssssss*/

/* caroisel*/
$datas = array (
  'type' => 'flex',
  'altText' => 'Flex Message',
  'contents' =>
  array (
    'type' => 'carousel',
    'contents' =>
    array (
      0 =>
      array (
        'type' => 'bubble',
        'direction' => 'ltr',
        'header' =>
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'contents' =>
          array (
            0 =>
            array (
              'type' => 'text',
              'text' => 'ร.ต.อ.สมชาย  มีสตางค์',
              'size' => 'xl',
              'align' => 'center',
              'gravity' => 'center',
              'color' => '#2216C3',
            ),
            1 =>
            array (
              'type' => 'separator',
              'margin' => 'sm',
            ),
            2 =>
            array (
              'type' => 'text',
              'text' => 'ชาย',
              'size' => 'lg',
              'align' => 'center',
              'color' => '#3D09DD',
            ),
          ),
        ),
        'body' =>
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'md',
          'margin' => 'lg',
          'contents' =>
          array (
            0 =>
            array (
              'type' => 'image',
              'url' => 'https://www.siamzone.com/music/news/2015/07381.jpg',
              'align' => 'center',
              'gravity' => 'center',
              'aspectRatio' => '9:16',
              'aspectMode' => 'cover',
              'backgroundColor' => '#471E1E',
            ),
            1 =>
            array (
              'type' => 'separator',
            ),
            2 =>
            array (
              'type' => 'box',
              'layout' => 'horizontal',
              'contents' =>
              array (
                0 =>
                array (
                  'type' => 'text',
                  'text' => 'รอง สว.ฝอ.ภ.จว.ชลบุรี',
                  'size' => 'xl',
                  'align' => 'center',
                  'gravity' => 'center',
                  'color' => '#1A4CE8',
                ),
              ),
            ),
            3 =>
            array (
              'type' => 'box',
              'layout' => 'horizontal',
              'flex' => 3,
              'margin' => 'xl',
              'contents' =>
              array (
                0 =>
                array (
                  'type' => 'text',
                  'text' => '08-1087-5332',
                  'align' => 'center',
                  'gravity' => 'center',
                  'weight' => 'bold',
                  'color' => '#DD1919',
                ),
                1 =>
                array (
                  'type' => 'button',
                  'action' =>
                  array (
                    'type' => 'uri',
                    'label' => 'CALL',
                    'uri' => 'https://linecorp.com',
                  ),
                  'style' => 'primary',
                  'gravity' => 'center',
                ),
              ),
            ),
          ),
        ),
      ),
      1 =>
      array (
        'type' => 'bubble',
        'direction' => 'ltr',
        'header' =>
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'contents' =>
          array (
            0 =>
            array (
              'type' => 'text',
              'text' => 'ร.ต.อ.สมชาย  มีสตางค์',
              'size' => 'xl',
              'align' => 'center',
              'gravity' => 'center',
              'color' => '#2216C3',
            ),
            1 =>
            array (
              'type' => 'separator',
              'margin' => 'sm',
            ),
            2 =>
            array (
              'type' => 'text',
              'text' => 'ชาย',
              'size' => 'lg',
              'align' => 'center',
              'color' => '#3D09DD',
            ),
          ),
        ),
        'body' =>
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'md',
          'margin' => 'lg',
          'contents' =>
          array (
            0 =>
            array (
              'type' => 'image',
              'url' => 'https://www.siamzone.com/music/news/2015/07381.jpg',
              'align' => 'center',
              'gravity' => 'center',
              'aspectRatio' => '9:16',
              'aspectMode' => 'cover',
              'backgroundColor' => '#471E1E',
            ),
            1 =>
            array (
              'type' => 'separator',
            ),
            2 =>
            array (
              'type' => 'box',
              'layout' => 'horizontal',
              'contents' =>
              array (
                0 =>
                array (
                  'type' => 'text',
                  'text' => 'รอง สว.ฝอ.ภ.จว.ชลบุรี',
                  'size' => 'xl',
                  'align' => 'center',
                  'gravity' => 'center',
                  'color' => '#1A4CE8',
                ),
              ),
            ),
            3 =>
            array (
              'type' => 'box',
              'layout' => 'horizontal',
              'flex' => 3,
              'margin' => 'xl',
              'contents' =>
              array (
                0 =>
                array (
                  'type' => 'text',
                  'text' => '08-1087-5332',
                  'align' => 'center',
                  'gravity' => 'center',
                  'weight' => 'bold',
                  'color' => '#DD1919',
                ),
                1 =>
                array (
                  'type' => 'button',
                  'action' =>
                  array (
                    'type' => 'uri',
                    'label' => 'CALL',
                    'uri' => 'https://linecorp.com',
                  ),
                  'style' => 'primary',
                  'gravity' => 'center',
                ),
              ),
            ),
          ),
        ),
      ),
      2 =>
      array (
        'type' => 'bubble',
        'direction' => 'ltr',
        'header' =>
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'contents' =>
          array (
            0 =>
            array (
              'type' => 'text',
              'text' => 'ร.ต.อ.สมชาย  มีสตางค์',
              'size' => 'xl',
              'align' => 'center',
              'gravity' => 'center',
              'color' => '#2216C3',
            ),
            1 =>
            array (
              'type' => 'separator',
              'margin' => 'sm',
            ),
            2 =>
            array (
              'type' => 'text',
              'text' => 'ชาย',
              'size' => 'lg',
              'align' => 'center',
              'color' => '#3D09DD',
            ),
          ),
        ),
        'body' =>
        array (
          'type' => 'box',
          'layout' => 'vertical',
          'spacing' => 'md',
          'margin' => 'lg',
          'contents' =>
          array (
            0 =>
            array (
              'type' => 'image',
              'url' => 'https://www.siamzone.com/music/news/2015/07381.jpg',
              'align' => 'center',
              'gravity' => 'center',
              'aspectRatio' => '9:16',
              'aspectMode' => 'cover',
              'backgroundColor' => '#471E1E',
            ),
            1 =>
            array (
              'type' => 'separator',
            ),
            2 =>
            array (
              'type' => 'box',
              'layout' => 'horizontal',
              'contents' =>
              array (
                0 =>
                array (
                  'type' => 'text',
                  'text' => 'รอง สว.ฝอ.ภ.จว.ชลบุรี',
                  'size' => 'xl',
                  'align' => 'center',
                  'gravity' => 'center',
                  'color' => '#1A4CE8',
                ),
              ),
            ),
            3 =>
            array (
              'type' => 'box',
              'layout' => 'horizontal',
              'flex' => 3,
              'margin' => 'xl',
              'contents' =>
              array (
                0 =>
                array (
                  'type' => 'text',
                  'text' => '08-1087-5332',
                  'align' => 'center',
                  'gravity' => 'center',
                  'weight' => 'bold',
                  'color' => '#DD1919',
                ),
                1 =>
                array (
                  'type' => 'button',
                  'action' =>
                  array (
                    'type' => 'uri',
                    'label' => 'CALL',
                    'uri' => 'https://linecorp.com',
                  ),
                  'style' => 'primary',
                  'gravity' => 'center',
                ),
              ),
            ),
          ),
        ),
      ),
    ),
  ),
);
/*caroisel*/

		/*$datas['type'] = 'text';
		$datas['text'] = $text;*/
    /*$datas['type'] = 'location';
    $datas['title'] = 'เซ็นทรัลพลาซา ลาดพร้าว';
    $datas['address']= '1693 ถนนพหลโยธิน แขวงจตุจักร เขตจตุจักร กรุงเทพมหานคร 10900';
    $datas['latitude'] =  13.8164458;
    $datas['longitude'] =  100.558962;*/



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
