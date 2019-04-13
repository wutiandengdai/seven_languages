<?php 
require_once('../../../private/initialize.php');

if(is_post()){ 
    echo 'New Page </br>';
    echo 'Title: '.($_POST['title'] ?? '').'</br>';
    echo 'Author: '.($_POST['author'] ?? '').'</br>';
    echo 'Position: '.($_POST['position'] ?? '').'</br>';
    echo 'visible: '.($_POST['visible']==1 ? 'true' : 'false').'</br>';
}else{
    redirect_to('/member/pages/new.php');
}
?>