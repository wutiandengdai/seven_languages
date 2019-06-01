<?php require_once('../../../private/initialize.php'); ?>

<!doctype html>

<?php
  if(!isset($_GET['id'])){
    redirect_to('/member/subjects/index.php');
  }
  $id = $_GET['id'];
  $errors = [];

  if(is_post()){
    $subject = [];
    $subject['id'] = $id;
    $subject['subject_name']=$_POST['subject_name'] ?? '';
    $subject['position']=$_POST['position'] ?? '1';
    $subject['visible']=$_POST['visible'] ?? '0';

    $result = update_subject($db, $subject);
    //!!! has to be identical to true, otherwise, all none-false would be treated as true(including array)
    if($subject===true){
      redirect_to('/member/subjects/view.php?id='.$id);
    }else{
      $errors=$result;
      //var_dump($errors);
    }
  }else{
    $subject = get_subject_by_id($db, $id);
    $errors = [];
  }

  $subject_count = get_subject_count($db);
?>

<?php $page_title='Subject Edit';?>

<?php include(SHARED_PATH.'/member_header.php'); ?>

<div id="content"> 
  <a class="back-link" href="<?php echo url_of('/member/subjects/index.php'); ?>")>&laquo; Back to the List</a>
  
  <div class="subject edit">
    <h1>Edit Subject</h1>

    <?php echo display_errors($errors); ?>
    <?php 
    /**
     * Single page form submit
     * The value stays
     */ ?>
    <form action="<?php echo url_of('/member/subjects/edit.php?id='.$id); ?>" method="post">
      <dl>
        <dt>Subject Name</dt>
        <dd><input type="text" name="subject_name" value="<?php echo $subject['subject_name']; ?>"/>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
          <?php
            for ($i =1; $i <= $subject_count; $i++){
              echo "<option value={$i}";
              if ($subject['position'] == $i){
                echo ' selected';
              }
              echo  ">{$i}</option>";
            }
          ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0"/>
          <input type="checkbox" name="visible" value="1" <?php if ($subject['visible'] == 1) echo 'checked'; ?>/>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Update Subject"/>
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH.'/member_footer.php'); ?>

