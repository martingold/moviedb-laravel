<?php declare(strict_types=1);

namespace App;

class OverallRatingCalculator
{

    public function calculateOverallRating(Movie $movie): ?float
    {
        $count = $movie->ratings()->count();
        if ($count === 0) {
            return null;
        }
        $sum = $movie->ratings()->sum('rating');
        return ($sum * 10) / $count;
    }

}
