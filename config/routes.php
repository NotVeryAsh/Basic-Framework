<?php

use Controllers\Dashboard;
use Controllers\Home;

const ROUTES = [
    '' => [Home::class, 'index'],
    'dashboard' => [Dashboard::class, 'index'],
];
