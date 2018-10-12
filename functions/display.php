<?php
    
    function display($page) { 
        
        include('html/html_head.php');
        echo $page;        
        include('html/footer.php');
        include('html/sidebar.php');
    }