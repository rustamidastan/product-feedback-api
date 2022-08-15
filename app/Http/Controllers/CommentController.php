<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index() {
        return Comments::all();
    }

    public function store(Request $request) {
        
        $fields = $request->validate([
            'body'=>'required',
            'feedback_id'=>'required'
        ]);

        $fields['user_id']=Auth::id();

        return Comments::create($fields);
    }
}
