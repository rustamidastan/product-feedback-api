<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable =['user_id', 'title', 'votes', 'feedback_type', 'body', 'roadmap_status'];
}
