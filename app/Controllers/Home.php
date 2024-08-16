<?php

namespace Controllers;

use Http\Response;

class Home {
    public function index()
    {
        Response::view('home', []);
    }
}