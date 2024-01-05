<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function departement(){
        return $this->belongsTo(Departement::class);
    }

    public function professors(){
        return $this->belongsToMany(Professor::class);
    }
    
}
