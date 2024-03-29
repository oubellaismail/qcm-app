<?php

namespace App\Models;

use App\Models\User;
use App\Models\Departement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Professor extends Model
{

    protected $fillable = [
        'user_id', 
        'departement_id'
    ];

    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function filieres()
    {
        return $this->belongsToMany(Filiere::class, 'filiere_professor', 'professor_id', 'filiere_id');
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
