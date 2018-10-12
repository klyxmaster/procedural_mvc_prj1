<?php

      function onlineGames() {
        
        if(file_exists(DATABASE_FOLDER.'online.db')) {
            $db = file(DATABASE_FOLDER.'online.db');
            $i = 0;
            foreach($db as $row=>$game) {
                $glist[$i] = unserialize($game);
                $i++;
            }
            return $glist;
        }else{
            $db = file(DATABASE_FOLDER.'bfg.db');
            $i = 0;
            foreach($db as $row=>$data) {                       // Get all games with the request genreID
                $data = unserialize($data);                     // unserialize it            
                $glist[$i] = $data;                             // add it to the new array
                $i++;                                           // inc the array counter           
            }
                
            usort($glist, function ($item1, $item2) {
                return $item1['gamerank'] <=> $item2['gamerank'];
            });
            
            // Cache this list if not exist
            if(!file_exists(DATABASE_FOLDER.'online.db')) {
                foreach($glist as $row=>$game) {
                    file_put_contents(DATABASE_FOLDER.'online.db', serialize($game).PHP_EOL, FILE_APPEND);
                }
            }
            
            return $glist;
        }
    } 