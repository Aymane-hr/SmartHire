<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable = [
        'user_id', 'file_path', 'extracted_text', 'score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'cv_skill');
    }

    public function matches()
    {
        return $this->hasMany(Matche::class);
    }
}
