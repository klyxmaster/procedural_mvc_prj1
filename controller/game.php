<?php

    function game($gameid) {
        
        $game = getGameById($gameid);
                
        $page = render(file_get_contents('tpl/game.tpl'), $game);   

        display($page);
        
    }