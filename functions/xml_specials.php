<?php
    /**
     *  @type   = w,d (weekly daily);
     *  @os     = pc, mac
     *  */
    function XML_Specials($type,$os){
        $xml_file               = init_bfg_xml($type == 'w'?BFG_WEEKLY:BFG_DAILY, $os);       
        $xml                    = new XMLReader();
        
        $xml->open($xml_file);
        while($xml->read() && $xml->name != 'game') { ; }
        while($xml->name == 'game') {
            $element = new SimpleXMLElement($xml->readOuterXML());
            $game = array(
                'gamename'                  => strval($element->gamename),
                'logo_url'                  => strval($element->logo_url),
                'tagline'                   => strval($element->tagline),
                'gameid'                    => strval($element->gameid),
                'genreid'                   => strval($element->genreid),
                'genrename'                 => strval($element->genrename),
                'allgenreid'                => strval($element->allgenreid),
                'offer_start_date'          => strval($element->offer_start_date),
                'offer_end_date'            => strval($element->offer_end_date),
                'link'                      => strval($element->link),
                'img'                       => strval($element->images->med),
                'price'                     => strval($element->price)
            );
            $xml->next('game');
            unset($element);
            
        }
            
        file_put_contents(DATABASE_FOLDER.($type == 'w'?'weekly':'daily')   .'special.txt', serialize($game));  
        
        
              
    }