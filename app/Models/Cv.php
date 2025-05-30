<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable = [
        'user_id',
        'file_path',
        'extracted_text',
        'score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class)->withPivot('skill_id', 'cv_id')->withoutTimestamps();
    }


    public function matches()
    {
        return $this->hasMany(JobMatche::class);
    }
}
