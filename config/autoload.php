<?php

spl_autoload_register(function ($className) {
   $file = ROOT . 'app' . DIRECTORY_SEPARATOR . $className . '.php';

   if(!file_exists($file)) {
       return;
   }

   require $file;
});