<?php
    function get_title($_title){
        return('<title>' . $_title . '</title>');
    }

    function open_page($_title){
        echo('<html><head>' . get_title($_title));
    }
    
    function close_page(){
        echo('</body></html>');
    }
?>