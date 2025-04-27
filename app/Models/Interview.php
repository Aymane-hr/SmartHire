<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $fillable = [
        'application_id', 'interview_date', 'zoom_link',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
