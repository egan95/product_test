<?php

namespace App\Http\Controllers;

use App\Models\Country;

class HomeController extends Controller
{   
    public function index() {

        $data_country = Country::orderBy('name')->get();
        $data = [
            'country' => $data_country
        ];
        return view('inquiry.v_index',$data);
    }
}