<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class ItemsController extends ResourceController
{
    public function index()
    {
        $items = [
            [
                'id'    => 1,
                'name'  => 'Laptop',
                'price' => 25000
            ],
            [
                'id'    => 2,
                'name'  => 'Mouse',
                'price' => 500
            ],
            [
                'id'    => 3,
                'name'  => 'Keyboard',
                'price' => 1200
            ]
        ];

        return $this->respond($items);
    }
}