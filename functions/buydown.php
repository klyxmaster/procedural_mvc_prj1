<?php
    
    /**
     *  create a download/buy link
     *  https://www.bigfishgames.com/download-games/30105/brownies/download.html
     *  */
    function downloadLink($game, $os, $downbuy) {
        $url = 'http://www.bigfishgames.com/download-games/'.
                    $game['gameid'].'/'.($os =='mac' ? 'mac/': '').
                    trimFilename($game['foldername']).'/'.($downbuy == 'download'?'download':'buy').'.html?channel=affiliates&amp;identifier='.AFF_CODE;
        return $url;
    }
    
    /**
     * buy link
     * https://store.bigfishgames.com/cart.php?productID=30550&siteID=1
     https://store.bigfishgames.com/cart.php?productID=23643&siteID=1&afcode=af12f011ecdf&src=pnp12f011ecdf&channel=affiliates&identifier=af12f011ecdf
     **/
    function buyLink($game) {
        $url = 'https://store.bigfishgames.com/cart.php?productID='.
                    $game['productid'].'&amp;siteID=1&amp;code='.AFF_CODE.'&amp;src=pnp'.AFF_CODE.
                    '&amp;channel=affiliates&amp;identifier='.AFF_CODE;
        return $url;
        
    }