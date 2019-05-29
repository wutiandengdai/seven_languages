<?php 
require_once('../../../private/initialize.php');

if(is_post()){ 
    $page['title']=h($_POST['title']) ?? '';
    $page['subject_id'] = h($_POST['subject_id']);
    $page['position']=h($_POST['position']);
    $page['visible']=h($_POST['visible']) ?? '0';
    $page['content']=h($_POST['content']);

    $result = insert_page($db, $page);
    if($result){
        $id = mysqli_insert_id($db);
        redirect_to('/member/pages/view.php?id='.$id);
    }
}else{
    redirect_to('/member/pages/new.php');
}
?>