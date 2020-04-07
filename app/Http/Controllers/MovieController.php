<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Movie;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{

    public function list()
    {
        return view('movie/list', [
            'movies' => Movie::orderBy('overall_rating')->get(),
        ]);
    }

    public function detail(string $slug)
    {
        return view('movie/detail', [
            'movie' => Movie::with('ratings')->where('slug', $slug)->first(),
        ]);
    }

    public function rate(string $slug)
    {
        $movie = Movie::whereSlug($slug)->first();
        $rating = Rating::firstWhere([
            'user_id' => Auth::user()->id,
            'movie_id' => $movie->id,
        ]) ?? new Rating();

        return view('movie/rate', [
            'movie' => $movie,
            'rating' => $rating,
        ]);
    }

    public function handleRate(string $slug, Request $request)
    {
        $movie = Movie::whereSlug($slug)->first();
        $rating = Rating::firstWhere([
            'user_id' => Auth::user()->id,
            'movie_id' => $movie->id,
        ]) ?? new Rating();
        $rating->fill($request->toArray());
        $rating->movie()->associate($movie);
        $rating->user()->associate(Auth::user());
        $rating->save();
        return redirect()->route('movie_detail', [
            'slug' => $movie->slug,
        ]);
    }

}
