<?php

namespace App\Http\Controllers;

use App\Services\HomeServices;

class HomeController extends Controller
{

    public function index(){

    $homeServices = new HomeServices;

    $teams = $homeServices->index();

    return view('welcome', compact('teams'));
}
}
