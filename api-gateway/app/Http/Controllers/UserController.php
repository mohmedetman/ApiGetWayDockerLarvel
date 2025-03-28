<?php

namespace App\Http\Controllers;

use App\RequestService;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
//use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class UserController extends Controller
{
    use RequestService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.products.base_uri');
        $this->secret = config('services.products.secret');
    }
//    public function fetchProducts()
//    {
//        $guzzle = new Client([
//            'base_uri' => 'http://localhost:8030/api/product',
//            'headers' => [
//                'Accept' => 'application/json; charset=utf-8'
//            ]
//        ]);
//        $response = $guzzle->get('');
//        return $response->getBody()->getContents();
//    }


    public function fetchProducts()
    {
        try {
            $client = new Client([
                'base_uri' => 'http://172.19.0.1:8030/api/products',
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'timeout' => 5,
            ]);

            $response = $client->get('');
            return json_decode($response->getBody(), true);

        } catch (RequestException $e) {
            // Log error or return a user-friendly message
            return response()->json([
                'error' => 'API server is unreachable. Is it running?',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
