<?php

namespace Controllers;

use Http\Response;

class Dashboard {
    public function index()
    {
        Response::view('dashboard', ['name' => 'name']);
    }
}