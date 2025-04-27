<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name'];

    public function cvs()
    {
        return $this->belongsToMany(Cv::class, 'cv_skill');
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_skill');
    }
}
