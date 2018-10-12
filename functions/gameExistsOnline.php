<?php

    function gameExistsOnline($gamename) {
        $onlinedb = file(DATABASE_FOLDER.'online.db');
        foreach($onlinedb as $row=>$data) {
            $onlinegame = unserialize($data);   
            if($gamename == $onlinegame['gamename']) {
                return $onlinegame;
                exit();
            }
        }
        return false;
    }