<?php require_once('../../../private/initialize.php'); ?>

<!doctype html>

<?php
  if(!isset($_GET['id'])){
    redirect_to('/member/subjects/index.php');
  }
  $id = $_GET['id'];
  $subject_name = '';
  $position = '';

  if(is_post()){
    $subject_name=$_POST['subject_name'] ?? '';
    $position=$_POST['position'] ?? '1';
    $visible=$_POST['visible']=='1' ? 'true' : 'false';

    echo $subject_name."<br>";
    echo $position."<br>";
    echo $visible."<br>";
  }else{
    //redirect_to('/member/subjects/new.php');
  }
?>

<?php $page_title='Subject Edit';?>

<?php include(SHARED_PATH.'/member_header.php'); ?>

<div id="content"> 
  <a class="back-link" href="<?php echo url_of('/member/subjects/index.php'); ?>")>&laquo; Back to the List</a>
  
  <div class="subject edit">
    <h1>Edit Subject</h1>
    <?php 
    /**
     * Single page form submit
     * The value stays
     */ ?>
    <form action="<?php echo url_of('/member/subjects/edit.php?id='.$id); ?>" method="post">
      <dl>
        <dt>Subject Name</dt>
        <dd><input type="text" name="subject_name" value="<?php echo $subject_name; ?>"/>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <option value="1">1</option>
            <option value="2">2</option>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0"/>
          <input type="checkbox" name="visible" value="1"/>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Update Subject"/>
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH.'/member_footer.php'); ?>

