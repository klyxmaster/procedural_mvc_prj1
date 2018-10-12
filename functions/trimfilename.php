<?php
    // this will remove the 'en_' of image filenames
    function trimFilename($foldername) {
        $foldername = explode('en_',$foldername);
        return $foldername[1];
    }