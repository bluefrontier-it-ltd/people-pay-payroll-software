<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'payment_run_id', 'user_id'];

    /**
     * Comment Author
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Related Payment Run
     */
    public function PaymentRun(): BelongsTo
    {
        return $this->belongsTo(PaymentRun::class);
    }
}
