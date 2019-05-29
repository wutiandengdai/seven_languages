<?php 
require_once('../../../private/initialize.php');

$page_title = "Page View";

$id = $_GET['id']??1;

$page = get_page_by_id($db, $id);
$subject = get_subject_by_id($db, $page['subject_id']);

?>

<?php include(SHARED_PATH.'/member_header.php'); ?>

<div id='content'>
    <a class="back-link" href="<?php echo url_of('/member/pages/index.php'); ?>")>&laquo; Back to the List</a>
    <br>
    <div class='subject-show'>
        <h1>Page: <?php echo h($page['title']); ?></h1>
        <div id="attributes">
            <dl>
                <dt>Subject</dt>
                <dd><?php echo h($subject['subject_name']); ?></dd>
            </dl>
            <dl>
                <dt>Title</dt>
                <dd><?php echo h($page['title']); ?></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd><?php echo h($page['position']); ?></dd>
            </dl>
            <dl>
                <dt>visible</dt>
                <dd><?php echo h($page['visible'])==1 ? 'true' : 'false'; ?></dd>
            </dl>
            <dl>
                <dt>Content</dt>
                <dd>
                  <p><?php echo h($page['content']); ?></p>
                </dd>
            </dl>
        </div>
    </div>
</div>

<?php include(SHARED_PATH.'/member_footer.php'); ?>