<?php

      function recentGames() {
        
        if(file_exists(DATABASE_FOLDER.'recent.txt')) {
            $db = file(DATABASE_FOLDER.'recent.txt');
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
            /**
             * Now we have a list of the selected genre id
             * Now sort them by game rank
             * PHP 7+
             * https://stackoverflow.com/questions/1597736/how-to-sort-an-array-of-associative-arrays-by-value-of-a-given-key-in-php
             * **/      
            usort($glist, function ($item1, $item2) {
                return $item1['releasedate'] < $item2['releasedate'];
            });
            
            // Cache this list if not exist
            if(!file_exists(DATABASE_FOLDER.'recent.txt')) {
                foreach($glist as $row=>$game) {
                    file_put_contents(DATABASE_FOLDER.'recent.txt', serialize($game).PHP_EOL, FILE_APPEND);
                }
            }
            
            return $glist;
        }
    } 