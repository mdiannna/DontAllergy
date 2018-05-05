<?php
use App\Http\Controllers\ChatBotController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});
$botman->hears('Start conversation', ChatBotController::class.'@startConversation');

