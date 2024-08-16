<?php

require "config/config.php";
require "config/autoload.php";

(new \Http\RouteHandler())->handle();