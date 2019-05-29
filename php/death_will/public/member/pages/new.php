<?php 
require_once('../../../private/initialize.php');
$page_title="Pages New";

$page_count = get_page_count($db);
$subjects = get_all_subjects($db);
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

<?php include(SHARED_PATH.'/member_header.php'); ?>