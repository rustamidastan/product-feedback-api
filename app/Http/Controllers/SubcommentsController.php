<?php

namespace App\Http\Controllers;

use App\Models\Subcomments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubcommentsController extends Controller
{
    public function index() {
        return Subcomments::all();
    }

    public function store(Request $request) {
        
        $fields = $request->validate([
            'body'=>'required',
            'comment_id'=>'required',
            'user_id'=>'required',
            'replied'=>'required',
        ]);


        return Subcomments::create($fields);
    }
}
