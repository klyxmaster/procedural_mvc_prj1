<?php
    
    /**
     *  @page to render,
     *  @game Game data to use */
    function render($page, $game) {
        
        /** SPECIALS - FORMAT IS HARD CODED FOR NOW **/
        $d           = specials('d','pc');
        $w           = specials('w','pc');
        
        $ds          = $d['tagline'].'<br/><img align="right" src="'.$d['img'].'"/>'.$d['gamename'];
        $ws          = $w['tagline'].'<br/><img align="right" src="'.$w['img'].'"/>'.$w['gamename'];
        $dsid        = $d['gameid'];
        $wsid        = $w['gameid'];
        
        /** MINOR ADJ TO TAGS */
        $game['releasedate'] = date("M d, Y (D)", strtotime($game['releasedate']));
        $bullets = ''; $i = 1;
        
        /** CREATE THE TAG LIST */
        $taglist = createTagList($game);
        
        /* LOOP THROUGH THE BFG INCLUDED FIELDS */
        foreach($game as $field=>$data) {
           
            /** CREATE IMAGES **/
            $img_feature = imgSrc($game['foldername'], '_feature');
            $img_80x80   = imgSrc($game['foldername'], '_80x80');
            $img_60x40   = imgSrc($game['foldername'], '_60x40');
            
            /** RENDER TAGS BUILT IN TAGS **/ 
            $page        = str_ireplace('{$'.$field.'}'     , $game[$field], $page);
            
            if(array_key_exists('bullet'.$i, $game) || ($i <= 5) ) {                 
                $bullets .= '<li>'.$game['bullet'.$i].'</li>';
               $i++;
            }
        }
        
        $online = gameExistsOnline($game['gamename']);
        if($online != False ) {
            $page = str_ireplace('{$playonline}', '<a href="'.URL.'play/'.$online['gameid'].'">Play Online</a>', $page);
        }else{
             $page = str_ireplace('{$playonline}', '', $page);
        }
        
        
        /** CUSTOM TAGS */
        $page        = str_ireplace('{$80x80_img}'          , $img_80x80        , $page);
        $page        = str_ireplace('{$feature_img}'        , $img_feature      , $page);
        $page        = str_ireplace('{$60x40_img}'          , $img_60x40        , $page);
        $page        = str_ireplace('{$screen1}'            , ssFullImg($game['foldername'], 1)        , $page);
        $page        = str_ireplace('{$screen2}'            , ssFullImg($game['foldername'], 2)        , $page);
        $page        = str_ireplace('{$screen3}'            , ssFullImg($game['foldername'], 3)        , $page);
        $page        = str_ireplace('{$th_screen1}'         , ssThImg($game['foldername'], 1)          , $page);
        $page        = str_ireplace('{$th_screen2}'         , ssThImg($game['foldername'], 2)          , $page);
        $page        = str_ireplace('{$th_screen3}'         , ssThImg($game['foldername'], 3)          , $page);
        
        $page        = str_ireplace('{$dailyspecial}'       , $ds               , $page);
        $page        = str_ireplace('{$dailyspecialid}'     , $dsid             , $page);
        $page        = str_ireplace('{$weeklyspecial}'      , $ws               , $page);
        $page        = str_ireplace('{$weeklyspecialid}'    , $wsid             , $page);
        $page        = str_ireplace('{$bullets}'            , $bullets          , $page);
        $page        = str_ireplace('{$taglist}'            , $taglist          , $page);
        $page        = str_ireplace('{$buylink}'            , buyLink($game)    , $page);
        $page        = str_ireplace('{$downloadlink}'       , downloadLink($game, 'pc', 'download')     , $page);
        
        $page        = str_ireplace('{$youtubelink}'        , youtubeLink($game['gamename'])            , $page); 
    
        
    
    
    
    
        return $page;
    }