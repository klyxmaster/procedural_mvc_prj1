<?php

    function getGameById($id) {
        $bfgdb = file(DATABASE_FOLDER.'bfg.db');
        foreach($bfgdb as $row=>$data) {
            $game = unserialize($data);
            if ($game['gameid'] == $id) {
                return $game;
            }
        }
    }