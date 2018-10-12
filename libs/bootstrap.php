<?php

     /* SET GLOBAL DEFINES */   
    $config = parse_ini_file('config.ini');
    foreach($config as $field=>$data)
        define($field, $data);
        
    /** INCLUDE ALL FUNCTIONS */
    foreach(glob('functions/*.php') as $function) include $function;
        
    /**
     *   check to see if we need to update the BFG XML DB
     *   by comparing a dummy date file with todays date.
     *
     *   CHANGE THE TIME TO AFTER 3 AM
     *   **/
    
    $lastPull = file_get_contents(LAST_DATE_FILE);    
    
    if(date("Y-m-d",time()) > $lastPull) {
        ini_set('max_execution_time', 300);     // the large db can take longer than 30 seconds on some systems this is 5min
        unlink(DATABASE_FOLDER.'bfg.db');       // delete the current db, it will be remade as well
        unlink(DATABASE_FOLDER.'online.db');    // delete online we'll make a new one here too
        updateXML_DB(BFG_DATA_XML,BFG_TYPE_PC); // populate the db with the new xml.
        updateXML_DB(BFG_DATA_XML,'og');        // create online db
        XML_Specials('d','pc');                 // load up daily special
        XML_Specials('w','pc');                 // load up weekly special
        file_put_contents('currdate.txt',date("Y-m-d h:i:s",time()));
    }
    /************************* [ UPDATE XML DB] ********************************/
    
    // whenever you edit the lib/genre.txt file, you will need to rerun
    // the following to update the db. as of this date, unsure what 191 is
    //createGenreLib();
    