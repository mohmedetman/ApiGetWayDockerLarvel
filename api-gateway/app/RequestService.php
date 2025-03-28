<?php
declare(strict_types = 1);
namespace App;
use GuzzleHttp\Client;
trait RequestService
{

    public function request($method, $requestUrl, $formParams = [], $headers = []) : string
    {
        $client = new Client([
            'base_uri' => $this->baseUri
        ]);
        if (isset($this->secret)) {
            $headers['Authorization'] = $this->secret;
        }
        $response = $client->request($method, $requestUrl,
            [
                'form_params' => $formParams,
                'headers' => $headers
            ]
        );
        return $response->getBody()->getContents();
    }
}

