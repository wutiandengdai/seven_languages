<?php

    /**
     * Get absolute url path of relative path (under public)
     */
    function url_of($script_path){
        if ($script_path[0] != '/'){
            $script_path = '/'.$script_path;
        }
        return WWW_ROOT.$script_path;
    }
?>
