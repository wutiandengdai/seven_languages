<?php
    require_once('../../../private/initialize.php');

    $page_title='Subject View';
    /**
     *  default url parameter
     */
    // 1. With if - else
    // if (isset($_GET['id'])){
    //     $id=$_GET['id'];
    // }else{
    //     $id = 1;
    // } 

    //2. determination mark
    //$id = isset($_GET['id'])?$_GET['id']:1;

    //3. php > 7.0
    $id = $_GET['id'] ?? 1;

    $subject = get_subject_by_id($db, $id);
    /** 
     * to prevent cross-site-scripting 
     * (:http://localhost/death_will/public/member/subjects/detail.php?id=<script>alert("Gotcha");</script>&name=John Smith), 
     * we want to use htmlspecialchars for dynamic data all the time
    */
    //echo htmlspecialchars($id);
?>

<?php include(SHARED_PATH.'/member_header.php'); ?>

<div id = "content">
    <a class="back-link" href="<?php echo url_of('/member/subjects/index.php'); ?>")>&laquo; Back to the List</a>
    <br>
    <div class='subject show'>
        <h1>Subject: <?php echo h($subject['subject_name']); ?> </h1>
        <div class="attributes">
            <dl>
                <dt>Subject Name</dt>
                <dd><?php echo h($subject['subject_name']); ?></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd><?php echo h($subject['position']); ?></dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></dd>
            </dl>
        </div>
    </div>



    <ul>
        <?php
        /** Always encoded */
        ?>
        <li><a href="detail.php?name=John Schmith">Name</a></li>
        <?php
        /** get encoded with urlencode, otherwise same text presented */
        ?>
        <li><a href="detail.php?query=<?php echo 'Widget&More'; ?>">Query</a></li>
        <?php
        /** get encoded with urlencode, otherwise same text presented */
        ?>
        <li><a href="detail.php?language=<?php echo urlencode('#!%'); ?>">Language</a></li>
    </ul>
</div>

<?php include(SHARED_PATH.'/member_footer.php');?>