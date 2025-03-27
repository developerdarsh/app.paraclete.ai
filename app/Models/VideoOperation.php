<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoOperation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'operation_id',
        'status',
        'script',
        'creator',
        'url'
    ];

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
