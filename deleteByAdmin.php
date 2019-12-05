<?php

include 'zzz-dbConnect.php';

if(isset($_GET['pid'])){
    $sql = 'delete from post where Post_ID='.$_GET['pid'];

    mysqli_query($link, $sql);
    header('Location: admin.php?#runningPost');
}

?>