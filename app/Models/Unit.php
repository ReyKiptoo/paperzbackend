<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'course_id',
        'year_semester',
        'unit_code',
        'unit_name',
    ];

    /**
     * Get the course that owns the unit.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the past papers for the unit.
     */
    public function pastPapers()
    {
        return $this->hasMany(PastPaper::class);
    }
}
