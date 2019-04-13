<?php require_once('../../../private/initialize.php');?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Page View</title>
</head>
<body>
    <a class="back-link" href="<?php echo url_of('/member/pages/index.php'); ?>")>&laquo; Back to the List</a>
    <br>
    <div class='subject-show'>
        Page ID: <?php echo h($_GET['id']??1); ?>
    </div>
</body>
</html>