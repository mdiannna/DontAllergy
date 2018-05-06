<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Allergy;
use App\Models\Statistics;


class ChatBotController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function chatbot()
    {
        return view('chatbot.chatbot');
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

    public function message(Request $request) {
        $userId = Auth::id();
        $user = Auth::user();

        $myAllergies = $user->allergies;

        if(count($myAllergies)) {
            $myAllergiesName = "You allergies are: " 
                                . $user->allergies->pluck("name");
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
        $currentSeasonId = 'App\Models\Season'::where('name', $currentSeason)
                                ->first()
                                ->id; 

        $allergiesCurrentSeason = "Allergies in the current season are: " .
        Allergy::where("season_id", $currentSeasonId)->pluck("name");
        
        $frequentAllergy = Statistics::max('value');

        $answers = 
        [
            "Hello"                                     
               => "Hi! Welcome to Don't Allergy Me! How can I help you?",
            "Hi"                                        
                => "Hello! Welcome to Don't Allergy Me! How can I help you?",
            "What are my allergies?"                    
                => "You allergies can be accessed at the following link: <a href='/my-allergies'>My allergies</a>: " ,
            "Where to find my allergies?"               
                => "You allergies can be accessed at the following link: <a href='/my-allergies'>My allergies</a> ",
            "Link to my allergies?"                     
                => "You allergies can be accessed at the following link: <a href='/my-allergies'>My allergies</a> ",
            "my allergies?"                             
                => $myAllergiesName,
            "What I should be aware of in this season?" 
                => $allergiesCurrentSeason,
            "Allergies in this season?"                 
                => $allergiesCurrentSeason,
            "Can you show statistics for my allergies?"     
                => "You statictics can be accessed at the following link: <a href='/my-statistics'>My statistics</a> ",
            "Can you show statistics for all users?"    
                => "Statistics for all users can be accessed at the following link: <a href='/all-statistics'>All statistics</a> ",
            "statistics?"                               
                => "Statistics for all users can be accessed at the following link: <a href='/all-statistics'>All statistics</a> ",
            "Most frequent allergy?"                    
                => $frequentAllergy
        ];

        if(isset($answers[$request->message])) {
            $botmessage = $answers[$request->message];                 
        }
        else {
            $botmessage =  '...Hm? Can you reformulate please?...';            
        }

        $response = array(
            'status'     => 'success',
            'message'    => $request->message,
            'botmessage' => $botmessage
        );
        return response()->json($response); 
    }
}
