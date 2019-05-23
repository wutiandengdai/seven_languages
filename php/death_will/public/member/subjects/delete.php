<?php
    require_once('../../../private/initialize.php');

    $page_title='Subject Delete';

    $id = $_GET['id'];

    if(is_post()){
        $result = delete_subject($db, $id);
        if($result){
            redirect_to('/member/subjects/index.php');
        }
    }else{
        $subject = get_subject_by_id($db, $id);
    }

?>

<?php include(SHARED_PATH.'/member_header.php'); ?>

<div id = "content">
    <a class="back-link" href="<?php echo url_of('/member/subjects/index.php'); ?>")>&laquo; Back to the List</a>
    <br>
    <div class='subject delete'>
        <h1>Delete Subject</h1>
        <p>Are you sure you want to delete subject? </p>
        <p><?php echo h($subject['subject_name']); ?></p>

        <form action = "<?php echo url_of('/member/subjects/delete.php?id='.h($subject['id'])); ?>" method = "post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete Subject"/>
            </div>
        </form>
    </div>
</div>

<?php include(SHARED_PATH.'/member_footer.php');?>