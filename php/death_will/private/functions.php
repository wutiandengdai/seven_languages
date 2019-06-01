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

    function h($string = ""){
        return htmlspecialchars($string);
    }

    function error_404(){
        header($_SERVER['SERVER_PROTOCOL']."404 Page Not Found");
        exit();
    }

    function error_500(){
        header($_SERVER['SERVER_PROTOCOL']."500 Internal Server Error");
        exit();
    }

    function redirect_to($url){
        header("Location:".url_of($url));
        exit();
    }

    function is_post(){
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
    
    function is_get(){
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    //ensure the input is an array
    function display_errors($errors=array()){
        $output='';
        if(!empty($errors)){
            $output.="<div class=\"errors\">";
            $output.="Please fix the following error:";
            $output .= "<ul>";
            foreach($errors as $err){
                $output .= "<li>".h($err)."</li>";
            }
            $output .= "</ul>";
            $output .= "</div>";
        }
        return $output;
    }
?>
