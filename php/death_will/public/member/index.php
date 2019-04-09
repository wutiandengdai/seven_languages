<?php
  //the only one place the path is still used.
 require_once('../../private/initialize.php'); 
?>

<!doctype html>

<?php $page_title='Member Area'; ?>
<?php include(SHARED_PATH.'/member_header.php'); ?>

<div id="content">
  <div id="main-menu">
  <h2>Main Menu</h2>
    <ul>
      <li><a href="<?php echo url_of('/member/subjects/index.php'); ?>">Subjects</a>
    </ul>
  </div>
</div>

<?php include(SHARED_PATH.'/member_footer.php'); ?>

