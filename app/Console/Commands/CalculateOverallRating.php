<?php

namespace App\Console\Commands;

use App\Movie;
use App\OverallRatingCalculator;
use Illuminate\Console\Command;

class CalculateOverallRating extends Command
{

    /**
     * @var string
     */
    protected $signature = 'movie:overall-rating';

    /**
     * @var string
     */
    protected $description = 'Calculate movie overall rating';

    /**
     * @var \App\OverallRatingCalculator
     */
    private OverallRatingCalculator $overallRatingCalculator;

    public function __construct(OverallRatingCalculator $overallRatingCalculator)
    {
        parent::__construct();
        $this->overallRatingCalculator = $overallRatingCalculator;
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        $movies = Movie::with('ratings')->get();
        foreach ($movies as $movie) {
            $rating = $this->overallRatingCalculator->calculateOverallRating($movie);
            $movie->overall_rating = $rating;
            $movie->save();
        }
        return 0;
    }
}
