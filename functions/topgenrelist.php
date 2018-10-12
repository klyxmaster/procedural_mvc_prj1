<?php

    /**
     *  Create a genre list ordered by top ranking
     *  Used for displaying a page of selected genre
     *  **/
    function topGenreList($genreid) {
        $db = file(DATABASE_FOLDER.'bfg.db');
        $i = 0;
        foreach($db as $row=>$data) {                       // Get all games with the request genreID
            $data = unserialize($data);                     // unserialize it
            $allgenreid = explode(',',$data['allgenreid']); // get the allgenre id as the genreid is usually null            
            if(array_search($genreid,$allgenreid)) {        // is the genreid found in the new allgrenre array?
               $glist[$i] = $data;                          // add it to the new array
               $i++;                                        // inc the array counter
            }
        }
        /**
         * Now we have a list of the selected genre id
         * Now sort them by game rank
         * PHP 7+
         * https://stackoverflow.com/questions/1597736/how-to-sort-an-array-of-associative-arrays-by-value-of-a-given-key-in-php
         * **/      
        usort($glist, function ($item1, $item2) {
            return $item1['gamerank'] <=> $item2['gamerank'];
        });
        return $glist;        
    }   