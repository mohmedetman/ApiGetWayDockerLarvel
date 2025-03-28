<?php

namespace App;

class ProductService
{
    use RequestService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.products.base_uri');
    }

    public function fetchProducts()
    {
//        dd($this->baseUri);
        return $this->request('GET', 'api/products');
    }

    public function fetchProduct($product)
    {
        return $this->request('GET', "/api/product/{$product}");
    }

    public function createProduct($data)
    {
        return $this->request('POST', '/api/product', $data);
    }

    public function updateProduct($product, $data)
    {
        return $this->request('PATCH', "/api/product/{$product}", $data);
    }

    public function deleteProduct($product)
    {
        return $this->request('DELETE', "/api/product/{$product}");
    }
}
