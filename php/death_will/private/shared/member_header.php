<?php 
  if(!isset($page_title)){
    $page_title='Member Area'; 
  }
?>

<html lang="en">
  <head>
    <title>DW-<?php echo htmlspecialchars($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_of('/stylesheets/member.css'); ?>" />
  </head>

  <body>
    <header>
      <h1>Death Will <?php echo $page_title; ?></h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_of('/member/index.php'); ?>">Menu</a></li>
      </ul>
    </navigation>