<?php
include_once 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$client = new Client();
$headers = [
    'Content-Type' => 'application/json',
    'Authorization' => 'Bearer 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'
];
$body = '{
  "prompt": "A Cat",
  "n": 1,
  "size": "1024x1024"
}';
$request = new Request('POST', 'https://api.openai.com/v1/images/generations', $headers, $body);
$res = $client->sendAsync($request)->wait();

$image = $res->getBody();
//decode the json response
$image = json_decode($image, true);
$photo = $image['data'][0]['url'];
print_r($image['data'][0]['url']);
