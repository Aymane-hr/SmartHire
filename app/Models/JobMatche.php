<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobMatche extends Model
{
    protected $fillable = [
        'cv_id', 'job_id', 'match_score',
    ];

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
