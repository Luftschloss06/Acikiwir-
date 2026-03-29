<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        // $name = 'Adam';
        // $email = 'adamrizkyramadhan33@gmail.com'; 
        $data = [
            'title' => 'Prodi SI UNJA',
            'name' => 'Acikiwir',
            'email' => 'adamrizkyramadhan33@gmail.com' 
        ];
        return view('home', compact('data'));
    }
}
