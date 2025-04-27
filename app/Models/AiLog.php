<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiLog extends Model
{
    protected $fillable = [
        'user_id', 'action', 'log_data',
    ];

    protected $casts = [
        'log_data' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
