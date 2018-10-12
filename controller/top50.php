<?php
    /** RCENT GAMES - JUST USE THE GENRE AS  A TEMPLATE **/
    /** TODO: incorporate some type of loop for the view page **/
    function top50() {
        /**
         * Recent page will just use the genre.tpl
         * it is the same. TODO: incorporate one page to do it all
         * */
        
        $page = file_get_contents('tpl/genre.tpl');
        
        
        $list = topGames();
        /*
        $genre_ary = genreName($genreId);
        $gname = $genre_ary['name'];
        $gdesc = $genre_ary['desc'];
        $gid = $genre_ary['id'];
       */
        $page = str_ireplace('{$genrename}','Popular Games',$page);
        $page = str_ireplace('{$genredesc}','Here are some trending games!',$page);   
        
        // Creat a complete list of topgenreX so users can use them however.
        $itemCnt = 0;
         // this is the #1 hit, so use a feature pic
        $topfeature = '<a href="'.URL.'game/'.$list[0]['gameid'].'"><img src="'.imgSrc($list[0]['foldername'],"_feature").'"/>';
        $topfeature .='<br/><b><small>'.$list[0]['gamename'].'</small></a></b>';
        $topfeature .='<br/>'.$list[0]['meddesc'];
        
        
        foreach($list as $row=>$data) {
            $itemCnt++;
           if($data['gamename'] > '') {
                
                if($itemCnt > 1) {
                    $topgenre = '<a href="'.URL.'game/'.$data['gameid'].'"><img class="img_border" src="'.imgSrc($data['foldername'],"_80x80").'"/>';
                    $topgenre .='<br/><b><small>'.$data['gamename'].'</a></small></b>';
                    $topgenre .='<br/>'.$data['shortdesc'];
                 
                   
                    $page = str_ireplace('{$topgenre'.$itemCnt.'}', $topgenre, $page);
                    
                }
           } else {
                $page = str_ireplace('{$topgenre'.$itemCnt.'}', '', $page);
           }
        }
        $page = str_ireplace('{$topgenre1}', $topfeature, $page);
        display($page);
    }