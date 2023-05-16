<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;

class MarvelController extends Controller
{

    private function getDefaultQueryParams()
    {
        $timestamp = time();
        $publicKey = env('MARVEL_PUBLIC_KEY');
        $privateKey = env('MARVEL_PRIVATE_KEY');

        $hash = md5($timestamp . $privateKey . $publicKey);

        return [
            'apikey' => $publicKey,
            'ts' => $timestamp,
            'hash' => $hash,
        ];
    }

    public function getCharacters()
    {
        try {

            $client = new Client([
                'base_uri' => 'https://gateway.marvel.com/v1/public/',
            ]);

            $response = $client->request('GET', 'characters', [
                'query' => $this->getDefaultQueryParams(),
            ]);

            $characters = json_decode($response->getBody())->data->results;

            return view('marvel.characters', compact('characters'));
        } catch (ConnectException $e) {
            // Error de conexión con la API
            return back()->with('error', 'Connection error with the Marvel API. Please try again later.');
        }
    }

    public function getCharacterById($id)
    {
        try {

            $client = new Client([
                'base_uri' => 'https://gateway.marvel.com/v1/public/',
            ]);

            $response = $client->request('GET', 'characters/' . $id, [
                'query' => $this->getDefaultQueryParams(),
            ]);

            $character = json_decode($response->getBody())->data->results[0];

            if (!$character) {
                return back()->with('error', 'No character found with the specified ID.');
            }

            return view('marvel.character', compact('character'));
        } catch (ConnectException $e) {
            // Error de conexión con la API
            return back()->with('error', 'Connection error with the Marvel API. Please try again later.');
        }
    }

    public function getComics()
    {
        try {
            $client = new Client([
                'base_uri' => 'https://gateway.marvel.com/v1/public/',
            ]);

            $response = $client->request('GET', 'comics', [
                'query' => $this->getDefaultQueryParams(),
            ]);

            $comics = json_decode($response->getBody(), true)['data']['results'];

            return view('marvel.comics', compact('comics'));
        } catch (ConnectException $e) {
            // Error de conexión con la API
            return back()->with('error', 'Connection error with the Marvel API. Please try again later.');
        }
    }

    public function getComicById($id)
    {
        try {
            $client = new Client([
                'base_uri' => 'https://gateway.marvel.com/v1/public/',
            ]);

            $response = $client->request('GET', 'comics/' . $id, [
                'query' => $this->getDefaultQueryParams(),
            ]);

            $comic = json_decode($response->getBody(), true)['data']['results'][0];

            if (!$comic) {
                return back()->with('error', 'No comic found with the specified ID.');
            }

            return view('marvel.comic', compact('comic'));
        } catch (ClientException $e) {
            if ($e->getResponse()->getStatusCode() === 404) {
                return back()->with('error', 'We couldn\'t find that comic issue.');
            } else {
                return back()->with('error', 'An error occurred while fetching the comic. Please try again later.');
            }
        } catch (ConnectException $e) {
            // Error de conexión con la API
            return back()->with('error', 'Connection error with the Marvel API. Please try again later.');
        }
    }
}
