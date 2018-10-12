<?php

    function Router() {
        // [0] = CONTROLLER
        // [x] = METHOD IN CONTROLLER
       
        if(isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = rtrim($url,'/');         // GET RID OF ANY '/'
            $url = explode('/', $url);      // BREAK UP URL
        }else{
            $url[0] = 'home';               // JUST INCASE THEY ARE AT ROOT 
        }
        
     
        /**
         * Here we check to see if the controller file itself exists
         * The controller filename and function should be exact to
         * keep a standard.
         * The function must have a single argument for consistancy
         * */
        $controller_file = CONTROLLER_FOLDER . $url[0] . '.php';
        if( file_exists($controller_file)){  // does the controller file exist
            
            require $controller_file; // which is url[0] function will be the same name as the filename
           // * do the if url[1] exist etc.... for the following *
         
            // add your case logic for your hight arg count down to here
            if(!empty($url[1]) && !empty($url[2])) {
                $url[0]($url[1],$url[2]);
            } elseif (!empty($url[1]) && empty($url[2])) {
                    $url[0]($url[1]);
            } elseif (empty($url[1]) && empty($url[2])) {
                    $url[0]();
            } else {
                die('controller problem in router, line:38 - 46');
            }
        } else {
            require CONTROLLER_FOLDER.'errorlog.php';
            ErrorLog(CONTROLLER_FOLDER.$url[0].'.php was not found in Router.php');
            exit;
        }
    
    }
