<?php 
require_once('../../../private/initialize.php');
$page_title="Pages Edit";
?>

<?php
  if(!isset($_GET['id'])){
    redirect_to('/member/pages/index.php');
  }
  $id=h($_GET['id']);

  if(is_post()){ 
    $page['title']=h($_POST['title']) ?? '';
    $page['subject_id'] = h($_POST['subject_id']);
    $page['position']=h($_POST['position']) ?? '';
    $page['visible']=h($_POST['visible']) ?? '0';
    $page['content']=h($_POST['content']) ?? '';
    $page['id']=$id;

    $result = update_page($db, $page);
    if($result){
      redirect_to('/member/pages/view.php?id='.$id);
    }
  }else{
    $page = get_page_by_id($db, $id);
  }
  $subject = get_subject_by_id($db, $page['subject_id']);
  $page_count = get_page_count($db);
  $subjects = get_all_subjects($db);
?>

<?php include(SHARED_PATH.'/member_header.php'); ?>

<div id = "content">
  <a class="back-link" href="<?php echo url_of('/member/pages/index.php'); ?>">&laquo; Back to Pages List</a>

  <div class = "page edit">
    <h1>Pages Edit</h1>
    
    <form action="<?php echo url_of('/member/pages/edit.php?id='.$id); ?>" method="post">
      <dl>
        <dt>Page Title</dt>
        <dd><input type='text' name='title' value="<?php echo $page['title']; ?>"></dd>
      </dl>
      <dl>
        <dt>Page Subject</dt>
        <dd>
          <select name = "subject_id">
            <?php while ($row = mysqli_fetch_assoc($subjects)) { ?>
              <option value = "<?php echo $row['id']; ?>"<?php echo $page['subject_id']==$row['id'] ?' selected':''; ?>> <?php echo $row['subject_name']; ?></option>
            <?php } ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <?php for($i = 1; $i <= $page_count; $i++){ ?>
              <option value="<?php echo $i; ?>"<?php echo $page['position']==$i ?' selected':''; ?>><?php echo $i; ?></option>
            <?php }?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
           <input type="hidden" name="visible" value="0">
           <input type="checkbox" name="visible" value="1" <?php echo $page['visible']=='1' ?'checked':''; ?>>
        </dd>
      </dl>
      <dl>
        <dt>Content</dt>
        <dd>
           <textarea name="content" value="<?php echo $page['content']; ?>"></textarea>
        </dd>
      </dl>
      <div id = 'operations'>
        <input type="submit" name="submit" value="Update Page"/>
      </div>
    </form>
    
  </div>
</div>

<?php include(SHARED_PATH.'/member_header.php'); ?>