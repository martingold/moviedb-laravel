<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $title
 * @property string $description
 * @property string $image_url
 * @property \DateTime $created
 * @property string $slug
 * @property float $overall_rating
 */
class Movie extends Model
{

    protected $table = 'movie';

    protected $dates = [
        'created',
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function stars(): int
    {
        return round($this->overall_rating / 20.0);
    }

}
