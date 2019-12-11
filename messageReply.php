<?php

session_start();
include 'zzz-dbConnect.php';

if (isset($_POST['send'])) {

    // Update in Database
    $sql = 'update contact set Status=1 where Con_ID=' . $_GET['mid'];
    mysqli_query($link, $sql);

    
    // For sending email
    $replyText = $_POST['reply'];

    $sql = 'select Email from contact where Con_ID=' . $_GET['mid'];
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);

    $url = 'http://mailsender.ap-south-1.elasticbeanstalk.com/SendMail/amazon-ses-smtp-sample.php?rec=' . $row['Email'] . '&reply=' . $replyText;

    header('Location: ' . $url);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <form method="POST">
        <div class="msg-reply">
            <textarea name="reply" id="" cols="90" rows="5" required></textarea>
        </div>
        <button type="submit" name="send">Send</button>
    </form>

</body>

</html>