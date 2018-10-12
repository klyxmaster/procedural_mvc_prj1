<?php

    /**
     *  Create and/or update a new DB each day
     *  this will be th eone we can work with vs pulling from the bfg server
     *  **/
    function updateXML_DB($db,$type) {
        $xml_file               = init_bfg_xml($db,$type);
        $countIx                = 0;
        $xml                    = new XMLReader();
        
        $xml->open($xml_file);
        
        /** Keep going until we get to a game record **/
        while($xml->read() && $xml->name != 'game') { ; }
        
        while($xml->name == 'game') {
            $element = new SimpleXMLElement($xml->readOuterXML());
            
            // Stack the array with the data.
            $game = array(
                'gamename'                  => strval($element->gamename),
                'gameid'                    => strval($element->gameid),
                'family'                    => strval($element->family),
                'familyid'                  => strval($element->familyid),
                'productid'                 => strval($element->productid),
                'genreid'                   => strval($element->genreid),
                'allgenreid'                => strval($element->allgenreid),
                'shortdesc'                 => delHardReturns(strval($element->shortdesc)),
                'meddesc'                   => delHardReturns(strval($element->meddesc)),
                'bullet1'                   => delHardReturns(strval($element->bullet1)),
                'bullet2'                   => delHardReturns(strval($element->bullet2)),
                'bullet3'                   => delHardReturns(strval($element->bullet3)),
                'bullet4'                   => delHardReturns(strval($element->bullet4)),
                'bullet5'                   => delHardReturns(strval($element->bullet5)),
                'longdesc'                  => delHardReturns(strval($element->longdesc)),
                'foldername'                => strval($element->foldername),
                'hasdownload'               => strval($element->hasdownload),
                'macgameid'                 => strval($element->macgameid),
                'hasvideo'                  => strval($element->hasvideo),
                'hasflash'                  => strval($element->hasflash),
                'hasdwfeature'              => strval($element->hasdwfeature),
                'price'                     => strval($element->price),                
                'releasedate'               => strval($element->releasedate),
                'gamerank'                  => strval($element->gamerank),
                'gamesize'                  => strval($element->gamesize)
            );
            
            if($type == 'pc') {
                $game = array (
                    'pc_sysreqod'               => strval($element->systemreq->pc->sysreqos),
                    'pc_sysreqmhz'              => strval($element->systemreq->pc->sysreqmhz),
                    'pc_sysreqmem'              => strval($element->systemreq->pc->sysreqmem),
                    'pc_sysreqhd'               => strval($element->systemreq->pc->sysreqos)
                );
            }
            
            // Convert the release date to just the Y,m,d and get rid of the
            // time. Then we can compare  todays date with the release date.
            //$game['releasedate']            = substr($game['releasedate'],0,10);
            
            /**
             *  Serialize this record and save it to a db
             *  **/
            if($type == 'og'){
                file_put_contents(DATABASE_FOLDER.'online.db', serialize($game).PHP_EOL, FILE_APPEND);
            }else{
                file_put_contents(DATABASE_FOLDER.'bfg.db', serialize($game).PHP_EOL, FILE_APPEND);
            }
            
            if(date("Y-m-d",strtotime($game['releasedate'])) >= date("Y-m-d",time())) {
                file_put_contents(DATABASE_FOLDER.'newtoday.txt',serialize($game));
            }
            $xml->next('game');
            unset($element);
        }// As long as we are reading game.
    }