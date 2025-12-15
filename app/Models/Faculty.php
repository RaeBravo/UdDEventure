<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;

    public const STATUS_PENDING = 'pending';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_SUSPENDED = 'suspended';
    public const STATUS_REJECTED = 'rejected';

    protected $fillable = [
        'user_id',
        'bio',
        'specialization',
        'news_count',
        'status',
    ];

    /**
     * Get the user that owns the faculty profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the news for the faculty.
     */
    public function news()
    {
        return $this->hasManyThrough(News::class, User::class, 'id', 'faculty_id', 'user_id', 'id');
    }
}
