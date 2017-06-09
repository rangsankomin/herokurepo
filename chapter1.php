<?php

include ('line-bot.php');

$channelSecret = '6818df0cecde4786f6fc177155cc940d';
$access_token  = 'X3LZvU8+/mXKb/sJuuW7IumF/7kV3BYvPG2x+gmeMHGDrNxwzawcUUWS/7Cnm7l94neWZM1M/tAC33QrvZK4HRLz7I3c/gBHkXYui3w2WvhqZWT/qNMl0Qfnxjv4+qtk4S+waflWXYISoJEq3tTEOQdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {
		
    $bot->replyMessageNew($bot->replyToken, json_encode($bot->message));

    if ($bot->isSuccess()) {
        echo 'Succeeded!';
        exit();
    }

    // Failed
    echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
    exit();

}
