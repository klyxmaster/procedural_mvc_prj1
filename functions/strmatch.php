<?php
    
    /**
     * totally hate the php string functions for
     * matching a string. so wrote my own
     * */
    function strmatch($haystack, $needle) {
        
        /**
         *  apparently, the white spaces seem to give string
         *  comparrisons a headache, This funciton will actually
         *  catch a string as pos 0!!
         *  */
        $needle 		= str_ireplace(" ","",$needle);
        $haystack 		= str_ireplace(" ","",$haystack);
        
        $haystack       = strtolower($haystack);  // making sure
        $needle         = strtolower($needle);
        $needle_len     = strlen($needle);
       
        
        
        for ($i = 0; $i <= strlen($haystack)-1; $i++) {
           
            if(substr($haystack,$i, $needle_len) === $needle) {
               
                return true;
            }
        }
      
        return false;
    }