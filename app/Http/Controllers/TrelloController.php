<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;

class TrelloController extends Controller
{
    public function index($boardId)
    {
        try {
            $client = new Client(['base_uri' => 'https://api.trello.com/1/']);
            $response = $client->request('GET', 'boards/' . $boardId . '/cards', [
                'query' => [
                    'key' => env('TRELLO_KEY'),
                    'token' => env('TRELLO_TOKEN'),
                ],
            ]);
            $cards = json_decode($response->getBody(), true);
            return view('trello.cards', ['cards' => $cards, 'boardId' => $boardId]);
        } catch (ConnectException $e) {
            // Error de conexión con la API
            return back()->with('error', 'Connection error with the Trello API. Please try again later.');
        }
    }

    public function getBoards()
    {
        try {
            $client = new Client(['base_uri' => 'https://api.trello.com/1/']);
            $response = $client->request('GET', 'members/me/boards', [
                'query' => [
                    'key' => env('TRELLO_KEY'),
                    'token' => env('TRELLO_TOKEN'),
                ],
            ]);
            $boards = json_decode($response->getBody());
            return view('trello.boards', ['boards' => $boards]);
        } catch (ConnectException $e) {
            // Error de conexión con la API
            return back()->with('error', 'Connection error with the Trello API. Please try again later.');
        }
    }

    public function showCreateCardForm($boardId)
    {
        return view('trello.create_card', ['idBoard' => $boardId]);
    }
    public function storeCard(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'idBoard' => 'required',
        ]);
    
        try {
            $client = new Client(['base_uri' => 'https://api.trello.com/1/']);
            $response = $client->request('POST', 'cards', [
                'query' => [
                    'key' => env('TRELLO_KEY'),
                    'token' => env('TRELLO_TOKEN'),
                    'idList' => $this->getFirstListId($validatedData['idBoard']),
                    'idBoard' => $validatedData['idBoard'],
                    'name' => $validatedData['name'],
                    'desc' => $validatedData['description'],
                    'due' =>  $request->input('dueDate'),
                ],
            ]);
    
            $statusCode = $response->getStatusCode();
    
            if ($statusCode === 200) {
                return redirect()->route('cards.index', ['boardId' => $validatedData['idBoard']]);
            } else {
                return back()->with('error', 'Error creating the card. Please verify the data and try again.');
            }
        } catch (ConnectException $e) {
            // Error de conexión con la API
            return back()->with('error', 'Connection error with the Trello API. Please try again later.');
        }
    }
    

    public function getFirstListId($boardId)
    {
        try {
            $client = new Client(['base_uri' => 'https://api.trello.com/1/']);
            $response = $client->request('GET', 'boards/' . $boardId . '/lists', [
                'query' => [
                    'key' => env('TRELLO_KEY'),
                    'token' => env('TRELLO_TOKEN'),
                ],
            ]);
            $lists = json_decode($response->getBody(), true);
            return $lists[0]['id'];
        } catch (ConnectException $e) {
            // Error de conexión con la API
            return back()->with('error', 'Connection error with the Trello API. Please try again later.');
        }
    }

    public function edit($id)
    {
        try {
            $client = new Client(['base_uri' => 'https://api.trello.com/1/']);
            $response = $client->request('GET', "cards/{$id}", [
                'query' => [
                    'key' => env('TRELLO_KEY'),
                    'token' => env('TRELLO_TOKEN'),
                ],
            ]);
            $card = json_decode($response->getBody(), true);
            $boardId = $card['idBoard'];
            return view('trello.edit', ['card' => $card, 'cardId' => $id, 'boardId' => $boardId]);
        } catch (ConnectException $e) {
            // Error de conexión con la API
            return back()->with('error', 'Connection error with the Trello API. Please try again later.');
        }
    }

    public function update(Request $request, $cardId)
    {
        try {
            $client = new Client(['base_uri' => 'https://api.trello.com/1/']);
            $response = $client->request('PUT', "cards/{$cardId}", [
                'query' => [
                    'key' => env('TRELLO_KEY'),
                    'token' => env('TRELLO_TOKEN'),
                    'name' => $request->input('name'),
                    'desc' => $request->input('description'),
                    'due' => $request->input('dueDate'),
                ],
            ]);
    
            $statusCode = $response->getStatusCode();
    
            if ($statusCode === 200) {
                $boardId = $request->input('boardId');
                return redirect()->route('cards.index', ['boardId' => $boardId]);
            } else {
                return back()->with('error', 'Error updating the card. Please verify the data and try again.');
            }
        } catch (ConnectException $e) {
            // Error de conexión con la API
            return back()->with('error', 'Connection error with the Trello API. Please try again later.');
        }
    }    
}
