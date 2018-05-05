<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;


class ChatBotController extends Controller
{

     /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->listen();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function chatbot()
    {
        return view('chatbot.chatbot');
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function chatbot2()
    {

        // DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

       
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

     // dd($this->botman->getMessage());
     // 
     $this->botman->hears('sticker', function($bot) {
         $response = $bot->sendRequest('sendSticker', [
            'sticker' => '1234'
        ]);
         // dd($response);
         // return $response;
    });
        $response = $this->botman->sendRequest('sendMessage', $data);
        return $response;
    }
}
