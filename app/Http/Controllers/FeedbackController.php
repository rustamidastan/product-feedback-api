<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index() {
        return Feedback::all();
    }

    public function store(Request $request) {
        // $request->validate([
        //     'title'=> "required",
        //     'body'=>"required",
        //     'user_id'=>"required",
        //     'feedback_type'=>"required",
        //     'roadmap_status'=>"required",
        //     'votes'=>"required"
        // ]);

        return Feedback::create($request->all());
        
    }
}
