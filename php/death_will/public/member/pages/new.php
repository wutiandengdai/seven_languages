<?php 
  require_once('../../../private/initialize.php');
  $page_title="Pages New";

  if(is_post()){ 
    $page['title']=h($_POST['title']) ?? '';
    $page['subject_id'] = h($_POST['subject_id']);
    $page['position']=h($_POST['position']);
    $page['visible']=h($_POST['visible']) ?? '0';
    $page['content']=h($_POST['content']);

    $result = insert_page($db, $page);
    //!!! has to be identical to true, otherwise, all none-false would be treated as true(including array)
    if($result===true){
        $id = mysqli_insert_id($db);
        redirect_to('/member/pages/view.php?id='.$id);
    }else{
        $errors=$result;
    }
  }else{
    $errors=[];
  }

  $page_count = get_page_count($db);
  $subjects = get_all_subjects($db);
?>

<?php include(SHARED_PATH.'/member_header.php'); ?>

<div id = "content">
  <a class="back-link" href="<?php echo url_of('/member/pages/index.php'); ?>">&laquo; Back to Pages List</a>

  <div class = "page new">
    <h1>Pages New</h1>
    
    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_of('/member/pages/new.php'); ?>" method="post">
      <dl>
        <dt>Page Title</dt>
        <dd><input type='text' name='title' value=''></dd>
      </dl>
      <dl>
        <dt>Page Subject</dt>
        <dd>
          <select name = "subject_id">
            <?php while ($row = mysqli_fetch_assoc($subjects)) { ?>
              <option value = "<?php echo $row['id']; ?>"> <?php echo $row['subject_name']; ?></option>
            <?php } ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <?php for($i = 1; $i <= $page_count+1; $i++){ ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php }?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
           <input type="hidden" name="visible" value="0">
           <input type="checkbox" name="visible" value="1">
        </dd>
      </dl>
      <dl>
        <dt>Content</dt>
        <dd>
           <textarea name="content" ></textarea>
        </dd>
      </dl>
      <div id = 'operations'>
        <input type="submit" name="submit" value="Create New Page"/>
      </div>
    </form>
    
  </div>
</div>

<?php include(SHARED_PATH.'/member_footer.php'); ?>