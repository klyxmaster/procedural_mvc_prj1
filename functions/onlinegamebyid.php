<?php

    function onlineGameById($id) {
        $bfgdb = file(DATABASE_FOLDER.'online.db');
        foreach($bfgdb as $row=>$data) {
            $game = unserialize($data);
            if ($game['gameid'] == $id) {
                return $game;
            }
        }
    }