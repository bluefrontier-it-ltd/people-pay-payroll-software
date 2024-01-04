<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FolderViewers extends Model
{
    use HasFactory;

    /**
     * Folders
     */
    public function folders(): BelongsToMany
    {
        return $this->belongsToMany(Folder::class);
    }
}
