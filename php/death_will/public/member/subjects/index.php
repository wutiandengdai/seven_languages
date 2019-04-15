<?php
  //the only one place the path is still used.
 require_once('../../../private/initialize.php'); 
?>

<!doctype html>

<?php 
  $page_title='Subjects';
    
  $db_subjects = get_all_subjects($db);

  // $subjects = [
  //   ['id' => '1', 'position' => '1', 'visible' => '1', 'subject_name' => 'About Death Will'],
  //   ['id' => '2', 'position' => '2', 'visible' => '1', 'subject_name' => 'Consumer'],
  //   ['id' => '3', 'position' => '3', 'visible' => '1', 'subject_name' => 'Small Business'],
  //   ['id' => '4', 'position' => '4', 'visible' => '1', 'subject_name' => 'Partnership'],
  // ];
?>
<?php include(SHARED_PATH.'/member_header.php'); ?>

<div id="content"> 
  <div class="subjects listing">
    <h1>Subjects</h1>
    <div class="actions">
      <a class="action" href="<?php echo url_of('/member/subjects/new.php?'); ?>">Create New Subject</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>Position</th>
        <th>Visible</th>
  	    <th>Name</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php 
      // foreach($subjects as $subject) { 
        while ($subject = mysqli_fetch_assoc($db_subjects)){ ?>
          <tr>
            <td><?php echo h($subject['position']); ?></td>
            <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
            <td><?php echo h($subject['subject_name']); ?></td>
            <td><a class="action" href="<?php echo url_of('/member/subjects/view.php?id='.$subject['id']); ?>">View</a></td>
            <td><a class="action" href="<?php echo url_of('/member/subjects/edit.php?id='.$subject['id']); ?>">Edit</a></td>
            <td><a class="action" href="">Delete</a></td>
          </tr>
      <?php 
        } 
      ?>
  	</table>

  </div>
</div>

<?php 
mysqli_free_result($db_subjects);
include(SHARED_PATH.'/member_footer.php'); 
?>

