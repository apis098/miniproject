<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chatifyController extends Controller
{
    public function index(){
        return view('vendor.Chatify.pages.app');
    }
}
