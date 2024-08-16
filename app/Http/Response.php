<?php

namespace Http;

class Response {

    static $viewDir = ROOT . "views" . DIRECTORY_SEPARATOR;

    static function setHeaders($headers)
    {
        foreach($headers as $header) {
            header($header);
        }
    }

    static function json($data = [], $status = 200)
    {
        self::setHeaders([
            'Content-Type: application/json'
        ]);

        http_response_code($status);

        echo json_encode($data);
        exit;
    }

    // TODO Pass data into view
    static function view($view, $data = [])
    {
        self::setHeaders([
            'Content-Type: text/html'
        ]);

        $view = self::$viewDir . $view . ".php";
        $view = file_exists($view) ? $view : self::$viewDir . "404.php";

        echo file_get_contents($view);
        exit;
    }
}
