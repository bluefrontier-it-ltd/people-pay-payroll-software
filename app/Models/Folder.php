<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Folder extends Model
{
    use HasFactory;

    /**
     * Parent Folders
     */
    public function parent()
    {
        return $this->belongsTo(Folder::class, 'parent_id');
    }

    /**
     * Child Folders
     */
    public function children()
    {
        return $this->hasMany(Folder::class, 'parent_id');
    }

    /**
     * Folder editors
     */
    public function editors(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Folder viewers
     */
    public function viewers(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * See a log of uploaded documents
     */
    public function logs()
    {
        return $this->morphMany(Logs::class, 'model');
    }
}
