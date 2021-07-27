<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\StudentTrait;

class testController extends Controller
{
    //

    use StudentTrait;
    
    public function test()
    {
        return "sandeep kumar";
    }

    
    // trait example 

    public function std()
    {
        $products = $this->Get_test();
       return $products;
    }
}
