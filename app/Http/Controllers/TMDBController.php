<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;

class TMDBController extends Controller
{
    public function indexM(Request $request)
    {
        try {
    
            $client = new Client();
    
            if ($request->has('movie')) {
                $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $request->input('movie'), [
                    'query' => [
                        'api_key' => env('TMDB_API_KEY')
                    ]
                ]);
    
                $movie = json_decode($response->getBody()->getContents());
    
                if (!$movie) {
                    return back()->with('error', 'Movie not found.');
                }
            } else {
                $movie = null;
            }
    
            $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/popular', [
                'query' => [
                    'api_key' => env('TMDB_API_KEY')
                ]
            ]);
    
            $movies = json_decode($response->getBody()->getContents())->results;
    
            return view('movies.indexMovies', compact('movie', 'movies'));
        } catch (ConnectException $e) {
            // Error de conexión con la API
            return back()->with('error', 'Connection error with the TMDB API. Please try again later.');
        }
    }    

    public function indexS(Request $request)
    {
        try {
            $client = new Client();

            if ($request->has('series')) {
                $response = $client->request('GET', 'https://api.themoviedb.org/3/tv/' . $request->input('series'), [
                    'query' => [
                        'api_key' => env('TMDB_API_KEY')
                    ]
                ]);

                $serie = json_decode($response->getBody()->getContents());
                
                if (!$serie) {
                    return back()->with('error', 'Show not found.');
                }

            } else {
                $serie = null;
            }

            $response = $client->request('GET', 'https://api.themoviedb.org/3/tv/popular', [
                'query' => [
                    'api_key' => env('TMDB_API_KEY')
                ]
            ]);

            $series = json_decode($response->getBody()->getContents())->results;

            return view('movies.indexShows', compact('serie', 'series'));
        } catch (ConnectException $e) {
            // Error de conexión con la API
            return back()->with('error', 'Connection error with the TMDB API. Please try again later.');
        }
    }
}
