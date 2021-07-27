<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CollectionController extends Controller
{
    //

    private $cols;

    public function __construct()
    {
        $json = Http::get('https://jsonplaceholder.typicode.com/todos/')
        ->json();

        $this->cols =collect($json[0]['title']);
    }

    public function collect()
    {
        return $this->cols;
    }

    

}
