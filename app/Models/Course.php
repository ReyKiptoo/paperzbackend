<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['id', 'college_id', 'name'];

    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
