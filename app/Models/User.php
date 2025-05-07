<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Namu\WireChat\Traits\Chatable;
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use Chatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function cvs()
    {   
        return $this->hasMany(CV::class);
    }

    public function matches()
    {
        return $this->hasManyThrough(
            JobMatche::class,
            CV::class,
            'user_id', // Foreign key on CVs table
            'cv_id',   // Foreign key on Matches table
            'id',      // Local key on Users table
            'id'       // Local key on CVs table
        );
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'cv_skill', 'cv_id', 'skill_id')
            ->using(CvSkill::class)
            ->withTimestamps();
    }
}
