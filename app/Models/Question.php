<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['description',"quiz_id"];

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}

