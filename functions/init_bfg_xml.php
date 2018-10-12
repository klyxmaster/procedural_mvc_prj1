<?php

    /**
     *  Sets up the library xml for account number etc..
     *  **/
    function init_bfg_xml($data, $type) {
        $xml_file = $data;
        $xml_file = str_replace('%BFG_USERNAME%',BFG_USERNAME,$xml_file);
        $xml_file = str_replace('%BFG_LOCALE%',BFG_LOCALE,$xml_file);
        $xml_file = str_replace('%BFG_TYPE%',$type,$xml_file);
        return $xml_file;
    }