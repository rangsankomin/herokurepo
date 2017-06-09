<?php

require_once './vendor/autoload.php';

use Symfony\Component\Yaml\Yaml;

setlocale(LC_CTYPE, "en_US.UTF-8");

$configs = Yaml::parse(file_get_contents('./config.yml'));
if (empty($configs) || empty($configs['channel_token'])) {
  return;
}

$channel_token = 'X3LZvU8+/mXKb/sJuuW7IumF/7kV3BYvPG2x+gmeMHGDrNxwzawcUUWS/7Cnm7l94neWZM1M/tAC33QrvZK4HRLz7I3c/gBHkXYui3w2WvhqZWT/qNMl0Qfnxjv4+qtk4S+waflWXYISoJEq3tTEOQdB04t89/1O/w1cDnyilFU=';


$body = file_get_contents('php://input');

$json = json_decode($body, true);
if (empty($json)) {
  return;
}

$url = 'https://api.line.me/v2/bot/message/reply';

$headers = [
  'Content-Type:application/json',
  'Authorization: Bearer ' . $channel_token,
];

$http = new \KS\HTTP\HTTP();
$http->setHeaders($headers);

foreach ($json['events'] as $event) {
  
  $replyToken = $event['replyToken'];

  //https://devdocs.line.me/en/#send-message-object
  $post_data = [
    'replyToken' => $replyToken,
    'messages' => [
      [
        'type' => 'image',
        'originalContentUrl' => 'https://github.com/rangsankomin/herokurepo/blob/master/images/beer.jpg',
        'previewImageUrl' => 'https://github.com/rangsankomin/herokurepo/blob/master/images/beer_preview.jpg',
      ],
    ]
  ];
  
  $response = $http->post($url, json_encode($post_data));
}