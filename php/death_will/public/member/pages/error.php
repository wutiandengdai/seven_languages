<?php 
require_once('../../../private/initialize.php'); 

$test = h($_GET['test']) ?? '';
if($test=='redirect'){
    redirect_to('/member/pages/index.php');
}elseif($test=='404'){
    error_404();
}elseif($test=='500'){
    error_500();
}else{
    echo h($test);
}

?>