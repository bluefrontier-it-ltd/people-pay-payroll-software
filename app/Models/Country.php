<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Country extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name', 'continent_id', 'currency_id'];

    public function continent()
    {
        return $this->belongsTo(Continent::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    /**
     * See a log of uploaded documents
     */
    public function logs()
    {
        return $this->morphMany(Logs::class, 'model');
    }
    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this->addMediaConversion('thumb')
    //         ->width(368)
    //         ->height(232)
    //         ->pdfPageNumber(2);
    // }
}
