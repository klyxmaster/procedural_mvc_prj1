<?php

    function search() {
        if(!isset($_POST)) { header('location:'.URL);}
        $search_str     = htmlentities($_POST['searchtxt']);
        $needle         = strtolower($search_str);
        $haystack       = file(DATABASE_FOLDER.'bfg.db');
        $cnt            = -1;
        foreach($haystack as $row=>$game) {
            
            $game = unserialize($game);
         
         
            if( (strpos(strtolower($game['gamename']), $needle) ) || (strpos(strtolower($game['longdesc']),$needle))) {
                $cnt++;
               // Add it to a new array
               $srch[$cnt] = $game;
            }
        }
        
        
         $search_results ="";
        $thispage = file_get_contents('tpl/search.tpl');
         $thispage = str_ireplace('{$searchtxt}',$needle,$thispage);
        if($cnt < 1) {
            $srch[0] = 'No Results Found';
            $thispage = str_ireplace('{$search_results}','<tr><td></td><td>No Results found...</td><td></td></tr>',$thispage);
        } else {
            
            // Sort by populatority
             usort($srch, function ($item1, $item2) {
                    return $item1['gamerank'] <=> $item2['gamerank'];
                });
           
            foreach($srch as $row=>$data) {
                //$data = unserialize($data);
                $search_results .= "<tr onclick=\"window.location='".URL."game/".$data['gameid']."';\"><td><img src='".imgSrc($data['foldername'],'_60x40')."'/></td><td>".$data['gamename'].'</td><td>'.$data['shortdesc'].'</td></tr>';
                
            }
            
           
            $thispage = str_ireplace('{$search_results}',$search_results,$thispage);
        }
        display($thispage);
    }