<?php
  require_once('db_credentials.php');
  require_once('validations.php');

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

    $errors = validate_subject($subject);
    if(!empty($errors)){
      return $errors;
    }else{
      if(!is_subject_name_unique($conn, $subject['subject_name'])){
        $errors[] = "Name already exist.";
        return $errors;
      }
    }

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

    $errors = validate_subject($subject);
    if(!empty($errors)){
      return $errors;
    }else{
      if(!is_subject_name_unique($conn, $subject['subject_name'])){
        $errors[] = "Name already exist.";
        return $errors;
      }
    }
    
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

  function is_subject_name_unique($conn, $subject_name, $current_id="0"){
    $query = "select count(*) as count from subjects where subject_name = '". $subject_name."'";
    //for existing ones
    $query .= " and id !='".$current_id."'";
    $result = mysqli_query($conn, $query);
    $count=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $count['count'] === 0;
  }

  function validate_subject($subject){
    $errors=[];
    if(is_blank($subject['subject_name'])){
      $errors[] = "Subject name can not be blank";
    }
    if(!is_length_valid($subject['subject_name'], ['min'=>2, 'max'=>255])){
      $errors[] = "Subject name length must between 2 and 255";
    }

    $position_int=(int)$subject['position'];
    if($position_int <= 0){
      $errors[] = "Position must be greater than 0.";
    }
    if($position_int >999){
      $errors[] = "Position must be less than 999.";
    }

    $visible_str = (string)$subject['visible'];
    if(!has_inclusion_of($visible_str, ["0","1"])){
      $errors = "Visible must be true or false";
    }
    return $errors;
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


  function get_page_by_id($conn, $id){
    $query = "select * from pages where id = '".$id."'";
    $query .= " limit 1";
    $result = mysqli_query($conn, $query);

    if_result_set($result);
    $page = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $page;
  }

  function insert_page($conn, $page){
    $query = "insert into pages (subject_id, title, position, visible, content) values (";
    $query .= "'".$page['subject_id']."', ";
    $query .= "'".$page['title']."', ";
    $query .= "'".$page['position']."', ";
    $query .= "'".$page['visible']."', ";
    $query .= "'".$page['content']."')";

    $errors = validate_page($page);
    if(!empty($errors)){
      return $errors;
    }else{
      if(!is_page_title_unique($conn, $page['title'])){
        $errors[] = "Title already exist.";
        return $errors;
      }
    }

    $result = mysqli_query($conn, $query);
    if($result){
      return true;
    }else{
      echo mysqli_error($conn);
    }
  }

  function update_page($conn, $page){
    $query = "update pages set ";
    $query .= "subject_id = '".$page['subject_id']."', ";
    $query .= "title = '".$page['title']."', ";
    $query .= "position = '".$page['position']."', ";
    $query .= "visible = '".$page['visible']."', ";
    $query .= "content = '".$page['content']."' ";
    $query .= "where id = '".$page['id']."' ";
    $query .= "limit 1";

    $errors = validate_page($page);
    if(!empty($errors)){
      return $errors;
    }else{
      if(!is_page_title_unique($conn, $page['title'])){
        $errors[] = "Title already exist.";
        return $errors;
      }
    }

    $result = mysqli_query($conn, $query);
    if($result){
      return true;
    }else{
      echo mysqli_error($conn);
    }
  }

  function delete_page($conn, $id){
    $query = "delete from pages where id = '".$id."' ";
    $query .= "limit 1";

    $result = mysqli_query($conn, $query);
    if($result){
      return true;
    }else{
      echo mysqli_error($conn);
    }
  }

  function is_page_title_unique($conn, $title, $current_id="0"){
    $query = "select count(*) as count from pages where title = '". $title."'";
    //for existing ones
    $query .= " and id !='".$current_id."'";
    $result = mysqli_query($conn, $query);
    $count=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $count['count'] === 0;
  }

  #indicate the max position value
  function get_page_count($conn){
    $query = "select count(id) as count from pages where 1 = 1";

    $result = mysqli_query($conn, $query);
    if_result_set($result);
    $count = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $count['count'];
  }

  function validate_page($page){
    $errors=[];
    if(is_blank($page['title'])){
      $errors[] = "Page title can not be blank";
    }
    if(!is_length_valid($page['title'], ['min'=>2, 'max'=>255])){
      $errors[] = "Page title length must between 2 and 255";
    }
    
    if(is_blank($page['subject_id'])){
      $errors[] = "Subject can not be blank";
    }

    $position_int=(int)$page['position'];
    if($position_int <= 0){
      $errors[] = "Position must be greater than 0.";
    }
    if($position_int >999){
      $errors[] = "Position must be less than 999.";
    }

    $visible_str = (string)$page['visible'];
    if(!has_inclusion_of($visible_str, ["0","1"])){
      $errors[] = "Visible must be true or false";
    }

    if(!is_length_valid($page['content'], ['max'=>1000])){
      $errors[] = "Conent size can not be larger than 1000";
    }

    return $errors;
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