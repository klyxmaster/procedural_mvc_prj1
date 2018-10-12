<?php

    // RETURN GENRE NAME BASED ON ID
    function genreName($id) {
        $genre_list = file(DATABASE_FOLDER.'genre.lib');
        foreach($genre_list as $row=>$data) {
            $r = unserialize($data);
           
            if ($id == $r['id']) {
                $name = explode(" Games",$r['name']);
                $r['name'] = $name[0];
               return $r;
            }
        }    
           
        $r['id'] = $id;
        $r['name'] = 'NA';
        $r['desc'] = 'none';
        return $r;
        
        /**
         *  Send back a null and write th emissing id to a text file in cache
         *  **/
        file_put_contents('cache/genre_missing_id.txt',$id."\n",FILE_APPEND);
        return "";
    }