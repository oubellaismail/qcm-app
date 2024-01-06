<?php

namespace App\Models;

use App\Models\Filiere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{

    protected $fillable = [
        'user_id',
        'filiere_id'
    ];

    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function filiere () {
        return $this->belongsTo(Filiere::class);
    }
}
