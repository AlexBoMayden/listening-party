<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class ListeningParty extends Model
{
    /** @use HasFactory<\Database\Factories\ListeningPartyFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var list<string>
     */
    protected $guarded = ['id'];

    /**
     * Get the attributes that should be cast.
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'start_time' => 'datetime',
            'end_time' => 'datetime',
        ];
    }

    public function episode(): BelongsTo
    {
        return $this->belongsTo(Episode::class);
    }

    public function podcast(): HasOneThrough
    {
        return $this->hasOneThrough(Podcast::class, Episode::class, 'id', 'id', 'episode_id', 'podcast_id');
    }
}
