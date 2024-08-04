<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once "logger.php";

use Atakde\DiscordWebhook\DiscordWebhook;
use Atakde\DiscordWebhook\Message\MessageFactory;

if($_SERVER["REQUEST_METHOD"] !== "POST") {
  echo "only post method is allowed";
  exit(0);
}

if(!(str_starts_with($_SERVER["REQUEST_URI"], "/api/webhooks/"))) {
    echo "discord webhook must starts with /api/webhooks/";
    exit(0);
}

$slackIncomingData = json_decode(file_get_contents("php://input"), true);

$messageFactory = new MessageFactory();
$embedMessage = $messageFactory->create('text');

$embedMessage->setUsername($slackIncomingData['username']);
$embedMessage->setAvatarUrl($slackIncomingData['icon_emoji']);
$embedMessage->setContent($slackIncomingData['text']);

$webhook = new DiscordWebhook($embedMessage);
$webhook->setWebhookUrl("https://discord.com/{$_SERVER['REQUEST_URI']}");
$webhook->setDebug(true);

try {
    $webhook->send();
} catch (\Atakde\DiscordWebhook\Exception\InvalidResponseException $e) {
    echo "an error occurred, you can find the request in the log file.";
    logRequest($slackIncomingData);
    die();
}


