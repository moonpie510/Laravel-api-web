<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'creator_id'];

    public function users(): BelongsToMany
    {
        return $this->BelongsToMany(User::class, 'event_users', 'event_id', 'user_id');
    }
}
