<?php

include 'zzz-dbConnect.php';

if(isset($_GET['pid'])){
    $sql = 'update post set Approved=1 where Post_ID='.$_GET['pid'];

    mysqli_query($link, $sql);
    header('Location: admin.php?#runningPost');
}

?>