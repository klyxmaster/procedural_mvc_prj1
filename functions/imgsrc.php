<?php

    /**
     * creates an image link
     * @type = _feather, _80x80, _60x40
     * */
    function imgSrc($foldername,$type) {
        return BFG_IMG_URL.$foldername.'/'.trimFilename($foldername).$type.'.jpg';
    }
    
    // thumbnail ss link
    function ssThImg($foldername, $n) {
        return BFG_IMG_URL.$foldername.'/th_screen'.$n.'.jpg';
    }
    
    // full ss link
    function ssFullImg($foldername, $n) {
        return BFG_IMG_URL.$foldername.'/screen'.$n.'.jpg';
    }
    
    function youtubeLink($gamename) {
        $link = str_replace(" ","-",$gamename);
        $link = "http://www.youtube.com/results?search_query=$link";
        return $link;
    }
    
    