<?php

namespace App\Http\Controllers;

use App\Models\Feedbacks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbacksController extends Controller
{
    public function index() {
        return Feedbacks::all();
    }

    public function show($id) {
        return Feedbacks::find($id);
    }

    public function store(Request $request) {
        
        $fields = $request->validate([
            // 'user_id'=>'required',
            'title'=>'required',
            'votes'=>'required',
            'feedback_type'=>'required',
            'roadmap_status'=>'required',
            'body'=>'required',
        ]);

        $fields['user_id']=Auth::id();

        return Feedbacks::create($fields);
    }

    public function update(Request $request, $id) {
        $feedback = Feedbacks::find($id);
        $feedback->update($request->all());
        return $feedback;
    }

    public function destroy($id) {
        return Feedbacks::destroy($id);
    }

    public function search($title) {
        return Feedbacks::where('title', 'like', '%'.$title.'%')->get();
    }
}
