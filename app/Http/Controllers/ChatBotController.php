<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;


class ChatBotController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        // create an instance
        $this->botman = BotManFactory::create($config);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function chatbot()
    {

        // DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

        $config = [
            // Your driver-specific configuration
        ];

        // give the bot something to listen for.
        $botman->hears('hello', function (BotMan $bot) {
            $bot->reply('Hello yourself.');
        });

        // start listening
        $botman->listen();

        return view('chatbot.chatbot');
    }


    // public function sendMessage($message) {
    public function sendMessage() {
            

        $data = [
            "driver" => "web",
            "userId" => "1234",
            "message" => "hello"
        ];
      
        // // dd(json_encode($data));

        // $config = [
        //     // Your driver-specific configuration
        // ];

        // // create an instance
        // $botman = BotManFactory::create($config);

        // // give the bot something to listen for.
        // $botman->hears('hello', function (BotMan $bot) {
        //     $bot->reply('Hello yourself.');
        // });

        // // start listening
        // $botman->listen();

     
        $response = $botman->sendRequest('sendMessage', $data);
        return $data;
    }
}
