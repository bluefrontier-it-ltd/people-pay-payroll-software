<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentRun extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'client_id', 'country_id', 'stage_1', 'stage_2', 'stage_3', 'stage_4', 'stage_5', 'stage_6', 'visible_to_client', 'visible_to_subby'];

    /**
     * Get the comments for the blog post.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Related Client
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Related Country
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * See a log of upated statuses
     */
    public function logs()
    {
        return $this->morphMany(Logs::class, 'model');
    }
}
