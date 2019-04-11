<?php 
require_once('../../../private/initialize.php');
?>
<!doctype html>

<?php include(SHARED_PATH.'/member_header.php');?>

<?php 
$page_title='Pages';
$pages=[
  ['id'=>1, 'position'=>1, 'visible'=>1, 'title'=>'Gone With the Wind', 'author'=>'Alexander Pope'],
  ['id'=>2, 'position'=>2, 'visible'=>1, 'title'=>'Momental Peace', 'author'=>'Alexander Pope'],
  ['id'=>3, 'position'=>3, 'visible'=>1, 'title'=>'A Letter from Sam', 'author'=>'Samuel Mule'],
  ['id'=>4, 'position'=>4, 'visible'=>1, 'title'=>'Das der Hirbel', 'author'=>'Perter Hartline'],
];?>


<div id='content'>
  <h1>Pages</h1>
  <div class='actions'>
    <a class='action' href="">Add New Page</a>
  </div>

  <table class='list'>
    <tr>
      <th>ID</th>
      <th>Position</th>
      <th>Visible</th>
      <th>Title</th>
      <th>Author</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
    </tr>

    <?php foreach($pages as $page){ ?>
      <tr>
        <td><?php echo $page['id']; ?></td>
        <td><?php echo $page['position']; ?></td>
        <td><?php echo $page['visible']==1?'true':'false'; ?></td>
        <td><?php echo $page['title']; ?></td>
        <td><?php echo $page['author']; ?></td>
        <td><a class='action' href="<?php echo url_of('/member/pages/view.php?id='.$page['id']); ?>">View</a></td>
        <td><a class='action' href="">Edit</a></td>
        <td><a class='action' href="">Delete</a></td>
    <?php } ?>
  </table>
</div>

<?php include(SHARED_PATH.'/member_footer.php');?>



