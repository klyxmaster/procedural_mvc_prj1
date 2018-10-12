<?php

    function genre_x() {
        $genre_tbl='<tr>';
        $row_cnt = 1;
        $max_col = 6;
        
        $genre_lib = file(DATABASE_FOLDER.'genrelist.txt');
        foreach($genre_lib as $row=>$data) {
            //$genre = unserialize($data);
            $genre = explode(';', $data);
            $genre_tbl .= "<td ><a href='".URL."genre/".$genre[0]."'>".$genre[1].'</a></td>';
            if($row_cnt % $max_col == 0) {
                $genre_tbl .= '</tr><tr>'."\n";
            }
            $row_cnt++;
        }
        $more_genre = file_get_contents('tpl/genre_x.tpl');
        $more_genre = str_ireplace('{$more_categories}', $genre_tbl, $more_genre);
        
        display($more_genre);
    }