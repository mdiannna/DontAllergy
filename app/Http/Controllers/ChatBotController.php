<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

// use BotMan\BotMan\BotMan;
// use BotMan\BotMan\BotManFactory;


class ChatBotController extends Controller
{

     /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
    //     $this->botman = app('botman');

    //     $this->botman->listen();

          $this->botman = app('botman');
 
         // our first BotMan command
         // $this->botman->hears('hello', function ($bot) {
         //     $bot->reply("Hello, I'm Hello World bot!");
         // });
 
 
         // $this->botman->hears("hello I'm {name}", function ($bot, $name) {
         //     $bot->reply("Hello, $name. I'm Hello World bot");
         // });
 
 
         $this->botman->listen();
     // }
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
            // parent::__construct();

        $this->middleware('auth');
        //   $this->botman = app('botman');

        //   $this->botman->hears('hello', function (BotMan $bot) {
        //     $bot->reply('Hello yourself.');
        // });

        // $this->botman->listen();
    }

//     /**
//      * Show the application dashboard.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function chatbot2()
//     {

//         // DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

       
//         return view('chatbot.chatbot');
//     }


//     // public function sendMessage($message) {
//     public function sendMessage() {
            

//         $data = [
//             "driver" => "web",
//             "message" => "hello"
//         ];
      
//         // dd(json_encode($data));

//         // $config = [
//         //     // Your driver-specific configuration
//         // ];

//         // // create an instance
//         // $this->botman = BotManFactory::create($config);

//         // // // give the bot something to listen for.
        

//         // start listening
//         // $this->botman->listen();
// // $this->botman->driverName = "web";
//      // dd($this->botman);
//      // 
//     //  $this->botman->hears('sticker', function($bot) {
//     //      $response = $bot->sendRequest('sendSticker', [
//     //         'sticker' => '1234'
//     //     ]);
//     //      // dd($response);
//     //      // return $response;
//     // });
//      dd($this->botman);
//         $response = $this->botman->sendRequest('hello', $data);
//         dd($response);
//         $response = $this->botman->sendRequest('sendMessage', $data);
//         return $response;
//     }
//     

    
}
