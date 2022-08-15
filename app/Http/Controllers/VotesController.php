<?php

namespace App\Http\Controllers;

use App\Models\Votes;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function index() {
        return Votes::all();
    }

    public function store(Request $request) {
        $fields = $request->validate([
            'feedback_id'=>'required',
            'user_id'=>'required',
        ]);
    }
}
