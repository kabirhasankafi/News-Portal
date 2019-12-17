<?php
include 'zzz-dbConnect.php';
session_start();

if (!isset($_SESSION['ID'])) {
    header('Location: 404.php');
}

if (isset($_POST['post'])) {

    $title = trim($_POST['title']);
    $catID = $_POST['category'];
    $des = trim($_POST['description']);
    $date = date_create();

    // Image upload code
    $file = $_FILES['file'];
    print_r($file);
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'lib/upload/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There is an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
    // Image upload code end

    // Insert sql for new post
    $sql = 'INSERT into post (Title, User_ID, Cat_ID, Description, Image, DateTime) values ("' . $title . '", "' . $_SESSION['ID'] . '", "' . $catID . '", "' . $des . '", "' . $fileDestination . '", "' . date_format($date, "d-m-Y") . '")';
    mysqli_query($link, $sql);
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Daily News</title>

    <!-- link-area-start -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="CSS/responsive.css">
    <link rel="stylesheet" href="CSS/owl.carousel.min.css">
    <link rel="stylesheet" href="CSS/animate.min.css">

    <!-- link-area-end -->

</head>

<body>
    <!-- header-area-start -->

    <?php include 'zzz-header.php'; ?>

    <!-- header-area-end -->
    


    <div>
        <ul>
            <li><a onclick="hideFunction('1')" >Hi</a></li>
            <li><a onclick="hideFunction('2')" >Buy</a></li>
            <li><a onclick="hideFunction('3')" >Okay</a></li>
            <li><a onclick="hideFunction('4')" >Great</a></li>
        </ul>
    </div>

    <div id="1">
        <p>Hi div</p>
    </div>
    <div id="2">
        <p>Buy div</p>
    </div>
    <div id="3">
        <p>Okay div</p>
    </div>
    <div id="4">
        <p>Great div</p>
    </div>

    <script>
        function hideFunction(textID) {
            var x = document.getElementById(textID);

            if (x.style.display === "none") {
                x.style.display = "block";
            }
            else {
                x.style.display = "none";
            }
        }

    </script>



    <div class="arrow-top"> <i class="fas fa-arrow-up"></i> </div>



    <!-- link-area-start -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
    <script src="JS/jquery-3.3.1.min.js"></script>
    <script src="JS/owl.carousel.min.js"></script>
    <script src="JS/isotope.pkgd.min.js"></script>
    <script src="JS/wow.min.js"></script>
    <script src="JS/main.js"></script>
    <script src="JS/customs.js"></script>
    <script>
        new WOW().init();
    </script>
    <!-- link-area-end -->

</body>

</html>