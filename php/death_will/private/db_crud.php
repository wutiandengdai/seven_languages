<?php
  require_once('db_credentials.php');

  function db_connect(){
      $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
      if_db_connect();
      return $conn;
  }

  function get_all_subjects($conn){
    if(isset($conn)){
      $query = "select * from subjects ";
      $query .= "order by position asc";
      $result = mysqli_query($conn, $query);
      
      if_result_set($result);
      return $result;
    }
  }

  function get_all_pages($conn){
    if(isset($conn)){
      $query = "select * from pages ";
      $query .= "order by subject_id asc, position asc";
      $result = mysqli_query($conn, $query);

      if_result_set($result);
      return $result;
    }
  }

  function db_close($conn){
    if(isset($conn)){
        mysqli_close($conn);
    }
  }

  function if_db_connect(){
    if(mysqli_connect_errno()){
      $msg = "DB Connnection Failed[".mysqli_connect_errno()."]: ";
      $msg .= mysqli_connect_error();
      exit($msg);
    }
  }

  function if_result_set($result){
    //when query failed, a boolean false would be returned
    if(!$result){
      exit("Result query failed.");
    }
  }

?>