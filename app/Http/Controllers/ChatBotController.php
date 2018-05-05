<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Allergy;
use App\Models\Statistics;
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

          // $this->botman = app('botman');
 
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

    public function message(Request $request) {
         $userId = Auth::id();
        $user = Auth::user();

        $myAllergies = $user->allergies;

        if(count($myAllergies)) {
            $myAllergiesName = "You allergies are: " . $user->allergies->pluck("name");
        } else {
              $myAllergiesName  = "You don't have allergies";
        }


    $month = \Carbon\Carbon::now()->month;
      if($month == 1 || $month == 2 || $month == 12) {
        $currentSeason = 'Winter';
      }
      if($month == 3 || $month == 4 || $month == 5) {
        $currentSeason = 'Spring';
      }
      if($month == 6 || $month == 7 || $month == 8) {
        $currentSeason = 'Summer';
      }
      if($month == 9 || $month == 10 || $month == 11) {
        $currentSeason = 'Fall';
      }
      $currentSeasonId = 'App\Models\Season'::where('name', $currentSeason)->first()->id; 



        $allergiesCurrentSeason = "Allergies in the current season are: " .
Allergy::where("season_id", $currentSeasonId)->pluck("name");
    

      $frequentAllergy = Statistics::find(Statistics::max('value'));
        

        $answers = 
        [
            "Hello" => "Hi! Welcome to Don't Allergy Me! How can I help you?",
            "Hi" => "Hello! Welcome to Don't Allergy Me! How can I help you?",
            "What are my allergies?" => "You allergies can be accessed at the following link: <a href='/my-allergies'>My allergies</a>: " ,
            "Where to find my allergies?" => "You allergies can be accessed at the following link: <a href='/my-allergies'>My allergies</a> ",
            "Link to my allergies?" => "You allergies can be accessed at the following link: <a href='/my-allergies'>My allergies</a> ",
            "my allergies?" => $myAllergiesName,
            "What I should be aware of in this season?" => $allergiesCurrentSeason,
            "Allergies in this season?" => $allergiesCurrentSeason,
            "Can you show statistics for my allergies?" => "You statictics can be accessed at the following link: <a href='/my-statistics'>My statistics</a> ",
             "Can you show statistics for all users?" => "Statistics for all users can be accessed at the following link: <a href='/all-statistics'>All statistics</a> ",
             "statistics?" => "Statistics for all users can be accessed at the following link: <a href='/all-statistics'>All statistics</a> ",
             "Most frequent allergy?" => "Asas"


        ];

        if(isset($answers[$request->message])) {
            $botmessage = $answers[$request->message];                 
        }
        else {
          $botmessage =  '...Hm? Can you reformulate please?...';            
        }

      $response = array(
          'status' => 'success',
          'message' => $request->message,
          'botmessage' => $botmessage
      );
      return response()->json($response); 
    }
}
