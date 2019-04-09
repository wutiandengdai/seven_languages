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

    echo $id;
?>