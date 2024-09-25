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

    static function view($view, $data = [])
    {
        self::setHeaders([
            'Content-Type: text/html'
        ]);

        extract($data, EXTR_PREFIX_SAME, "");

        ob_start();
        require file_exists(self::$viewDir . $view . ".php") ?
            self::$viewDir . $view . ".php" :
            self::$viewDir . "404.php";;
        echo ob_get_clean();
        exit;
    }
}
