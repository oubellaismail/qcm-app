<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id', 'is_passed', 'isVisible', 'professor_id'];

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function grade()
    {
        return $this->hasOne(Grade::class);
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
