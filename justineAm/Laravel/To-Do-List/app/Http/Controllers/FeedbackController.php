<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('feedback');
    }

    public function addComment(Request $request)
    {
        $comment = new Feedback();
        $comment->feedback = $request->get('comment');
        $comment->user_id = Auth::user()->id;
        $comment->save();

        return redirect()->back();
        
    }   
    
    public function show($feedback){
        
        $comment = Feedback::get();
         return view('feedback', compact('comment'));
    }
    
   
}
