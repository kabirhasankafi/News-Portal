<?php
include 'zzz-dbConnect.php';
session_start();

if($_GET['email'] != ''){

    $sql = 'select * from user where email="'.$_GET['email'].'"';
    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1){
        $row = mysqli_fetch_array($result);

        if($row['Code'] == 0){
            echo 'Already varified';
        }else{
            $sql = 'update user set code="0" where email="'.$_GET['email'].'"';
            mysqli_query($link, $sql);
            $_SESSION["ID"] = $row['ID'];
            $_SESSION["Username"] = $row['Username'];
            $_SESSION["Email"] = $row['Email'];
            $_SESSION["UserType"] = $row['UserType'];

            header('Location: index.php');
        }

    }
    else{
        echo 'Url in invalid';
    }

}

?>