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
    $subject_name=$_POST['subject_name'] ?? '';
    $position=$_POST['position'] ?? '1';
    $visible=$_POST['visible']=='1' ? 'true' : 'false';

    echo $subject_name."<br>";
    echo $position."<br>";
    echo $visible."<br>";
  }else{
    redirect_to('/member/subjects/new.php');
  }
?>