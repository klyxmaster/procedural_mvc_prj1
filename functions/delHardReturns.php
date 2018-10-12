<?php

    /**
     * Many strings have hard returns that mess up the db.
     * this will remove those.
     * **/
    function delHardReturns($snip) {
        $snip = str_replace(array("\n", "\t", "\r"), '', $snip);
        return($snip);
    }