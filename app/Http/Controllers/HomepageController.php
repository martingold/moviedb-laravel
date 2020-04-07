<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Movie;
use App\Rating;

class HomepageController extends Controller
{

    public function overview()
    {
        $ratings = Rating::query()
            ->with('user', 'movie')
            ->orderBy('created_at', 'desc')
            ->limit(10)->get();

        $movies = Movie::query()
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('homepage/overview', [
            'ratings' => $ratings,
            'movies' => $movies,
        ]);
    }

}
