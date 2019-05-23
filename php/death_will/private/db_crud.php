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

  function get_subject_by_id($conn, $id){
    if(isset($conn)){
      //Single quote around the param is necessary to prevent sql injection
      $query = "select * from subjects where id = '".$id."'";
      $result = mysqli_query($conn, $query);

      if_result_set($result);
      $subject=mysqli_fetch_assoc($result);
      mysqli_free_result($result);
      return $subject;  //return array
    }
  }

  function insert_subject($conn, $subject){
    $query = "insert into subjects (subject_name, position, visible) values(";
    $query .= "'".$subject['subject_name']."', ";
    $query .= "'".$subject['position']."', ";
    $query .= "'".$subject['visible']."')";

    $result = mysqli_query($conn, $query);
    if($result){
      return true;
    }else{
      echo mysqli_error($conn);
      exit;
    }
  }

  function update_subject($conn, $subject){
    $query = "update subjects set subject_name = ";
    $query .= "'".$subject['subject_name']."', ";
    $query .= "position = '".$subject['position']."', ";
    $query .= "visible = '".$subject['visible']."' ";
    $query .= "where id = '".$subject['id']."' ";
    $query .= "limit 1";  //Limit to one row only

    $result = mysqli_query($conn, $query);
    if($result){
      return true;
    }else{
      echo mysqli_error($conn);
    }
  }

  function delete_subject($conn, $id){
    $query = "delete from subjects where id = ";
    $query .= "'".$id."' ";
    $query .= "limit 1";

    $result = mysqli_query($conn, $query);
    if($result){
      return true;
    }else{
      echo mysqli_error($conn);
      exit;
    }
  }
 
  function get_subject_count($conn){
    $query = "select count(id) as count from subjects where 1 = 1";
    $result = mysqli_query($conn, $query);
    
    if_result_set($result);
    $count=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $count['count'];
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