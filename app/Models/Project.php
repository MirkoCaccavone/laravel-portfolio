<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //colleghiamo il type
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function tecnologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
