<?php
    
    /**
     * @type =  d,w (daily, weekly)
     * */
    function specials($type, $os) {
        $date = ($type == 'd'?'daily':'weekly');
        
        // See if required special exists
        if(!file_exists($date.'special.txt')) {
            //Create the library
            XML_Specials($date[0],$os);    
        }
        // continue to read the file 
        $gamelib = file_get_contents(DATABASE_FOLDER.$date.'special.txt');
        $data = unserialize($gamelib);
        $data['offer_end_date'] = substr($data['offer_end_date'],0,11);
        $daily = '<a href="'.URL.'game/'.$data['gameid'].'"><img src="'.$data['img'].'" align="left"/>'.
                $data['gamename'].'</a><br/>Expires:'.$data['offer_end_date'];
                
        return $data;      
        
    }