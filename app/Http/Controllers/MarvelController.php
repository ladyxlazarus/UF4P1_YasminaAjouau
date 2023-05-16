<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

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
        $client = new Client([
            'base_uri' => 'https://gateway.marvel.com/v1/public/',
        ]);

        $response = $client->request('GET', 'characters', [
            'query' => $this->getDefaultQueryParams(),
        ]);

        $characters = json_decode($response->getBody())->data->results;

        return view('marvel.characters', compact('characters'));
    }

    public function getCharacterById($id)
    {
        $client = new Client([
            'base_uri' => 'https://gateway.marvel.com/v1/public/',
        ]);

        $response = $client->request('GET', 'characters/' . $id, [
            'query' => $this->getDefaultQueryParams(),
        ]);

        $character = json_decode($response->getBody())->data->results[0];

        return view('marvel.character', compact('character'));
    }

    public function getComics()
    {
        $client = new Client([
            'base_uri' => 'https://gateway.marvel.com/v1/public/',
        ]);

        $response = $client->request('GET', 'comics', [
            'query' => $this->getDefaultQueryParams(),
        ]);

        $comics = json_decode($response->getBody(), true)['data']['results'];

        return view('marvel.comics', compact('comics'));
    }

    public function getComicById($id)
    {
        $client = new Client([
            'base_uri' => 'https://gateway.marvel.com/v1/public/',
        ]);

        $response = $client->request('GET', 'comics/' . $id, [
            'query' => $this->getDefaultQueryParams(),
        ]);

        $comic = json_decode($response->getBody(), true)['data']['results'][0];

        return view('marvel.comic', compact('comic'));
    }
}
