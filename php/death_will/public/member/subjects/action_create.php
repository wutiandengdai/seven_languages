<?php
  require_once('../../../private/initialize.php'); 

  /**
   * To detect form submission
   * 1. Key parameter set;
   * 2. 'submit' parameter set;
   * 3. Is request method post
   */
  //if(isset($_POST['subject_name'])){

  //if(isset($_POST['submit'])){

  if(is_post()){
    $subject = [];
    $subject['subject_name']=$_POST['subject_name'] ?? '';
    $subject['position']=$_POST['position'] ?? '1';
    $subject['visible']=$_POST['visible'] ?? '0';

    $result = insert_subject($db, $subject);
    if($result){
      $id = mysqli_insert_id($db);
      redirect_to('/member/subjects/view.php?id='.$id);
    }

  }else{
    redirect_to('/member/subjects/new.php');
  }
?>