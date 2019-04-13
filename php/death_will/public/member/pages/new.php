<?php 
require_once('../../../private/initialize.php');
$page_title="Pages New";
?>

<?php include(SHARED_PATH.'/member_header.php'); ?>

<div id = "content">
  <a class="back-link" href="<?php echo url_of('/member/pages/index.php'); ?>">&laquo; Back to Pages List</a>

  <div class = "page new">
    <h1>Pages New</h1>
    
    <form action="<?php echo url_of('/member/pages/action_create.php'); ?>" method="post">
      <dl>
        <dt>Page Title</dt>
        <dd><input type='text' name='title' value=''></dd>
      </dl>
      <dl>
        <dt>Page Author</dt>
        <dd><input type='text' name='author' value=''></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
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
      <div id = 'operations'>
        <input type="submit" name="submit" value="Create New Page"/>
      </div>
    </form>
    
  </div>
</div>

<?php include(SHARED_PATH.'/member_header.php'); ?>