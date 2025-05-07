<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CvSkill extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cv_skill';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cv_id',
        'skill_id',
        // Add 'proficiency' here if you added that column
    ];

    /**
     * Get the CV that owns the CV Skill
     */
    public function cv()
    {
        return $this->belongsTo(CV::class);
    }

    /**
     * Get the skill that owns the CV Skill
     */
    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}