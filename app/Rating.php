<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $rating
 * @property string $comment
 * @property \DateTime $created
 * @property \DateTime $updated_at
 */
class Rating extends Model
{

    protected $table = 'rating';

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'rating',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function movie()
    {
        return $this->belongsTo('App\Movie');
    }

}
