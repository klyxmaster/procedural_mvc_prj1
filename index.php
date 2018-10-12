<?php
    date_default_timezone_set('America/Chicago');
    require 'libs/bootstrap.php';
    define ('URL',      '/'.basename(dirname(__FILE__)).'/');
    
    
    router();
    