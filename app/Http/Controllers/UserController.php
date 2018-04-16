<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
     * show user allergies
     *
     * @return view
     */
    public function allergies()
    {
        $allergies = auth()->user()->allergies;
        return view('user_allergies', compact('allergies'));
    }

    /**
     * Update User info
     *
     */
    public function update(Request $request)
    {
        auth()->user()->update($request);
        return redirect()->back();
    }
}
