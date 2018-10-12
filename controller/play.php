<?php

    function play($gameid) {
        //http://games.bigfishgames.com/en_crusaders-of-the-lost-idols/online/index.html
        $game = onlineGameById($gameid);
        $page = file_get_contents('tpl/play.tpl');
        $page = str_ireplace('{$iframeplaylink}', 'http://games.bigfishgames.com/'.$game['foldername'].'/online/index.html', $page);
        $page = str_ireplace('{$gamename}', $game['gamename'].' Online', $page);
        
        display($page);
        
    }