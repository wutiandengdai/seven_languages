<?php
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

    /** 
     * to prevent cross-site-scripting 
     * (:http://localhost/death_will/public/member/subjects/detail.php?id=<script>alert("Gotcha");</script>&name=John Smith), 
     * we want to use htmlspecialchars for dynamic data all the time
    */
    echo htmlspecialchars($id);
?>
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