<?php require_once('../../../private/initialize.php'); ?>
<?php 
  $page_title='Subject New';

  if(is_post()){
    $subject['subject_name']=$_POST['subject_name'] ?? '';
    $subject['position']=$_POST['position'] ?? '1';
    $subject['visible']=$_POST['visible'] ?? '0';

    $result = insert_subject($db, $subject);
    //!!! has to be identical to true, otherwise, all none-false would be treated as true(including array)
    if($result===true){
      $id = mysqli_insert_id($db);
      redirect_to('/member/subjects/view.php?id='.$id);
    }else{
      $errors = $result;
    }
  }else{
    $errors = [];
  }
  
  $subject_count = get_subject_count($db); 
?>

<?php include(SHARED_PATH.'/member_header.php'); ?>

<div id="content"> 
  <a class="back-link" href="<?php echo url_of('/member/subjects/index.php'); ?>")>&laquo; Back to the List</a>
    
  <div class="subject new">
    <h1>Create Subject</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_of('/member/subjects/new.php'); ?>" method="post">
      <dl>
        <dt>Subject Name</dt>
        <dd><input type="text" name="subject_name"/>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
          <?php
            for ($i =1; $i <= $subject_count + 1; $i++){
              echo "<option value={$i}";
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
          <input type="checkbox" name="visible" value="1"/>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" name='submit' value="Create New Subject"/>
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH.'/member_footer.php'); ?>

