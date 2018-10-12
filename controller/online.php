<?php
    /** RCENT GAMES - JUST USE THE GENRE AS  A TEMPLATE **/
    /** TODO: incorporate some type of loop for the view page **/
    function online() {
        /**
         * Recent page will just use the genre.tpl
         * it is the same. TODO: incorporate one page to do it all
         * */
        $page = file_get_contents('tpl/genre.tpl');
        
        $list = onlineGames();
        /*
        $genre_ary = genreName($genreId);
        $gname = $genre_ary['name'];
        $gdesc = $genre_ary['desc'];
        $gid = $genre_ary['id'];
       */
        
        $page = str_ireplace('{$genrename}','Online Games',$page);
        $page = str_ireplace('{$genredesc}','Plays these right now, NO DOWNLOAD. Enjoy!!',$page);   
        
        // Creat a complete list of topgenreX so users can use them however.
        $itemCnt = 0;
         // this is the #1 hit, so use a feature pic
        $topfeature = '<a href="'.URL.'play/'.$list[0]['gameid'].'"><img src="'.imgSrc($list[0]['foldername'],"_feature").'"/>';
        $topfeature .='<br/><b><small>'.$list[0]['gamename'].'</small></a></b>';
        $topfeature .='<br/>'.$list[0]['meddesc'];
        
        
        foreach($list as $row=>$data) {
           
           if(!empty($data)) {
                    $itemCnt++;
                    $topgenre = '<a href="'.URL.'game/'.$data['gameid'].'"><img class="img_border" src="'.imgSrc($data['foldername'],"_80x80").'"/>';
                    $topgenre .='<br/><b><small>'.$data['gamename'].'</a></small></b>';
                    $topgenre .='<br/>'.$data['shortdesc'];
                    $page = str_ireplace('{$topgenre'.$itemCnt.'}', $topgenre, $page);
           } 
        }
        
        // DEBUG: TODO: fix this so we can do this for as many items
        // the following just fills up the tpl page (curr at 69 items)
        for($i = $itemCnt+1; $i <= 69; $i++) {
            $page = str_ireplace('{$topgenre'.$i.'}', '', $page);
        }
        display($page); 
    }