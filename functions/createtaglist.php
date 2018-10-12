<?php

    function createTagList($game) {
        $taglist = '';
        $allgenreid = explode(',', $game['allgenreid']);
        foreach($allgenreid as $index=>$genreId) {            
            $genre = genreName($genreId);
            if($genre['name'] != 'NA') {
                $taglist .= '<span class="taglist">'.
                '<a href="'.URL.'genre/'.$genre['id'].'">'.$genre['name'].'</a></span> ';
            }
               
        }
            
        return $taglist;
    }