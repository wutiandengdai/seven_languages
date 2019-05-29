<?php
    require_once('../../../private/initialize.php');

    $page_title='Page Delete';
    $id = h($_GET['id']);

    if(is_post()){
        $result = delete_page($db, $id);
        if($result){
            redirect_to('/member/pages/index.php');
        }
    }else{
        $page = get_page_by_id($db, $id);
    }

?>

<?php include(SHARED_PATH.'/member_header.php'); ?>

<div id = 'content'>
  <a class="back-link" href="<?php echo url_of('/member/pages/index.php'); ?>")>&laquo; Back to the List</a>
  <br>
  <div class = 'page delete' >
    <h1>Delete Page</h1>
    <p>Are you sure you want to delete page?</p>
    <p><?php echo $page['title']; ?></p>

    <form action = "<?php echo url_of('/member/pages/delete.php?id=').h($page['id']); ?>" method = "post">
      <div id = 'operation'>
        <input type="submit" name ="commit" value="Delete Page"/>
      </div>
    </form>
  </div>
</div>

<?php include(SHARED_PATH.'/member_footer.php'); ?>
