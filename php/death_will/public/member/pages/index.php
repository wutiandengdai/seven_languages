<?php 
require_once('../../../private/initialize.php');
?>
<!doctype html>

<?php include(SHARED_PATH.'/member_header.php');?>

<?php 
$page_title='Pages';

$db_pages = get_all_pages($db);

$pages=[
  ['id'=>1, 'position'=>1, 'visible'=>1, 'title'=>'Gone With the Wind', 'author'=>'Alexander Pope'],
  ['id'=>2, 'position'=>2, 'visible'=>1, 'title'=>'Momental Peace', 'author'=>'Alexander Pope'],
  ['id'=>3, 'position'=>3, 'visible'=>1, 'title'=>'A Letter from Sam', 'author'=>'Samuel Mule'],
  ['id'=>4, 'position'=>4, 'visible'=>1, 'title'=>'Das der Hirbel', 'author'=>'Perter Hartline'],
];?>

<div id='content'>
  <h1>Pages</h1>
  <div class='actions'>
    <a class='action' href="<?php echo url_of('/member/pages/new.php'); ?>">Add New Page</a>
  </div>

  <table class='list'>
    <tr>
      <th>Position</th>
      <th>Subject Id</th>
      <th>Visible</th>
      <th>Title</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
    </tr>

    <?php 
    while($page = mysqli_fetch_assoc($db_pages)){
    // foreach($pages as $page){ 
      ?>
      <tr>
        <td><?php echo h($page['position']); ?></td>
        <td><?php echo h($page['subject_id']); ?></td>
        <td><?php echo $page['visible']==1?'true':'false'; ?></td>
        <td><?php echo h($page['title']); ?></td>
        <td><a class='action' href="<?php echo url_of('/member/pages/view.php?id='.h($page['id'])); ?>">View</a></td>
        <td><a class='action' href="<?php echo url_of('/member/pages/edit.php?id='.h($page['id'])); ?>">Edit</a></td>
        <td><a class='action' href="">Delete</a></td>
    <?php } ?>
  </table>
</div>

<?php 
mysqli_free_result($db_pages);
include(SHARED_PATH.'/member_footer.php');
?>



