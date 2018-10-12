<?php

    function home() {
        
        $todaydb     = file_get_contents(DATABASE_FOLDER.'newtoday.txt');
        $today       = unserialize($todaydb);
        
        $page = render(file_get_contents('tpl/home.tpl'), $today);        
       
        display($page);
    }