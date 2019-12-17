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
    <div class="admin-page-area">

        <div class="row">

            <!-- Admin Menu -->
            <div class="col-md-3">
                <div class="admin-area-left">
                    <div class="admin-area-left-title">
                        <h3>Admin Panel</h3>
                    </div>

                    <div>
                        <ul>
                            
                            <li><a onclick="hideFunction('newpost')">Add New Post</a></li>
                            <li><a onclick="hideFunction('runningpost')">Running Post</a></li>
                            <li><a onclick="hideFunction('massage')">Message</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Admin menu details -->
            <div class="col-md-9">
                <div class="admin-area-right">
                    <div class="row grid">

                        <!-- New Post -->
                        <div class="col-md-12 grid-item" id="newpost">
                            <div class="add-post">
                                <div class="admin-section-title">
                                    <h2>Add New Post</h2>
                                </div>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="add-title">
                                        <label for="add-title"><b>Add Title</b></label> <br>
                                        <input type="text" name="title" placeholder="Enter Your Title" id="add-title">
                                    </div>
                                    <div class="add-text">
                                        <label for="add-text"><b>Add Description</b></label> <br>
                                        <textarea id="add-text" name="description" placeholder="Enter Your Description...."></textarea>
                                    </div>
                                    <div class="add-catagory">
                                        <label for="add-catagory"><b>Add Category</b></label>
                                        <select name="category">
                                            <option value="" disabled selected> Select Category</option>
                                            <?php
                                            $sql = 'select * from category';
                                            $run = mysqli_query($link, $sql);

                                            while ($row = mysqli_fetch_assoc($run)) {
                                                echo '<option value="' . $row['Cat_ID'] . '">' . $row['Name'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="add-picture">
                                        <label for="add-picture"><b>Add Featured Image</b></label>
                                        <input type="file" name="file" id="add-picture">
                                    </div>
                                    <div class="post-btn">
                                        <button type="submit" name="post">Post</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Running Post -->
                        <div class="col-md-12 grid-item" id="runningpost">
                            <div class="manage-runing-post">
                                <div class="admin-section-title">
                                    <h2>Running Post</h2>
                                </div>

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Post Date</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            if (isset($_POST['deleteOldPost'])) {
                                                $sql = 'select * from post';
                                                $result = mysqli_query($link, $sql);

                                                $date = date_create();
                                                $endDateTemp = date_format($date, "d-m-Y");
                                                $end_date = strtotime($endDateTemp); //Today date-time

                                                while ($row = mysqli_fetch_array($result)) {

                                                    $start_date = strtotime($row['DateTime']);

                                                    if (($end_date - $start_date) / 60 / 60 / 24 >= 3) {

                                                        $sql = 'delete from post where Post_ID=' . $row['Post_ID'];
                                                        mysqli_query($link, $sql);
                                                    }
                                                }
                                            }

                                            $sql = 'select * from Post, user, category where post.User_ID=user.ID and post.Cat_ID=category.Cat_ID ORDER by Post_ID DESC';
                                            $run = mysqli_query($link, $sql);
                                            while ($row = mysqli_fetch_assoc($run)) {
                                                $who = '';
                                                if ($row['UserType'] == "Admin") $who = 'Admin';
                                                else $who = $row['Username'];
                                        ?>
                                            <tr>
                                                <td>
                                                    <p><?php echo $row['Title'] ?></p>
                                                </td>
                                                <td>
                                                    <P><?php echo $row['Name'] ?></P>
                                                </td>
                                                <td>
                                                    <p><?php echo $who; ?></p>
                                                </td>
                                                <td>
                                                    <p><?php echo $row['DateTime'] ?></p>
                                                </td>
                                                <td><a href="deleteByAdmin.php?pid=<?php echo $row['Post_ID'] ?>"><i class="far fa-trash-alt"></i></a></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>

                                <!-- Delete post -->
                                <div class="clear-old-news">
                                    <form method="POST">
                                        <button type="submit" name="deleteOldPost">Delete old news</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Message part -->
                        <div class="col-md-12 grid-item" id="massage">
                            <div class="massage-from-user">
                                <div class="admin-section-title">
                                    <h2>Message</h2>
                                </div>

                                <?php
                                                                                $sql = 'select * from contact where Status=0';
                                                                                $result = mysqli_query($link, $sql);

                                                                                while ($row = mysqli_fetch_array($result)) {
                                ?>

                                    <div class="all-massage">
                                        <div class="msg-user-id">
                                            <p><b><i class="fas fa-user"></i> <?php echo $row['Username'] ?></b></p>
                                        </div>
                                        <div class="msg-subject">
                                            <p><b>Subject: </b><?php echo $row['Subject'] ?></p>
                                        </div>
                                        <div class="massage">
                                            <p><?php echo $row['Message'] ?></p>
                                        </div>
                                        <a href="messageReply.php?mid=<?php echo $row['Con_ID'] ?>">Reply</a>
                                    </div>
                                    <div class="line"></div>
                                <?php } ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="arrow-top"> <i class="fas fa-arrow-up"></i> </div>
    
    <script>
        function hideFunction(textID) {

            console.log(textID);
            
            document.getElementById("newpost").style.display = "none";
            
            var x = document.getElementById("runningpost");
            x.style.display = "none";

            x = document.getElementById("massage");
            x.style.display = "none";

            document.getElementById(textID).style.display = "block";
        }
    </script>
   

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