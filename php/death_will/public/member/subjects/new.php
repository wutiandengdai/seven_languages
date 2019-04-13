<?php require_once('../../../private/initialize.php'); ?>

<!doctype html>

<?php $page_title='Subject New';?>

<?php include(SHARED_PATH.'/member_header.php'); ?>

<div id="content"> 
  <a class="back-link" href="<?php echo url_of('/member/subjects/index.php'); ?>")>&laquo; Back to the List</a>
    
  <div class="subject new">
    <h1>Create Subject</h1>
    <form action="<?php echo url_of('/member/subjects/action_create.php'); ?>" method="post">
      <dl>
        <dt>Subject Name</dt>
        <dd><input type="text" name="subject_name"/>
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
        <input type="submit" name='submit' value="Create New Subject"/>
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH.'/member_footer.php'); ?>

