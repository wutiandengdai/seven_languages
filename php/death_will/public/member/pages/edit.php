<?php 
require_once('../../../private/initialize.php');
$page_title="Pages Edit";
?>

<?php
  if(!isset($_GET['id'])){
    redirect_to('/member/pages/index.php');
  }
  $id=$_GET['id'];
  $title='';
  $author='';
  $position='';
  $visible='';

  if(is_post()){ 
    $title=h($_POST['title']) ?? '';
    $author=h($_POST['author']) ?? '';
    $position=h($_POST['position']) ?? '';
    $visible=h($_POST['visible']) ?? '0';

    echo 'Edit Page </br>';
    echo 'Title: '.$title.'</br>';
    echo 'Author: '.$author.'</br>';
    echo 'Position: '.$position.'</br>';
    echo 'Visible: '.($visible=='1' ? 'true' : 'false').'</br>';
  }
?>

<?php include(SHARED_PATH.'/member_header.php'); ?>

<div id = "content">
  <a class="back-link" href="<?php echo url_of('/member/pages/index.php'); ?>">&laquo; Back to Pages List</a>

  <div class = "page edit">
    <h1>Pages Edit</h1>
    
    <form action="<?php echo url_of('/member/pages/edit.php?id=$id'); ?>" method="post">
      <dl>
        <dt>Page Title</dt>
        <dd><input type='text' name='title' value="<?php echo $title; ?>"></dd>
      </dl>
      <dl>
        <dt>Page Author</dt>
        <dd><input type='text' name='author' value="<?php echo $author; ?>"></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position" default="<?php echo $position; ?>">
            <option value='1' <?php echo $position=='1' ?'selected':''; ?>>1</option>
            <option value='2' <?php echo $position=='2' ?'selected':''; ?>>2</option>
            <option value='3' <?php echo $position=='3' ?'selected':''; ?>>3</option>
            <option value='4' <?php echo $position=='4' ?'selected':''; ?>>4</option>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
           <input type="hidden" name="visible" value="0">
           <input type="checkbox" name="visible" value="1" <?php echo $visible=='1' ?'checked':''; ?>>
        </dd>
      </dl>
      <div id = 'operations'>
        <input type="submit" name="submit" value="Update Page"/>
      </div>
    </form>
    
  </div>
</div>

<?php include(SHARED_PATH.'/member_header.php'); ?>