<?php
include 'zzz-dbConnect.php';
session_start();

if (!isset($_SESSION['ID'])) {
    header('Location: 404.php');
}

$sql = 'select * from user where ID=' . $_SESSION['ID'];
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

$bio = $row['Bio'];
$work = $row['Work'];
$study = $row['Study'];
$live = $row['Lives'];
$profile = $row['ProfilePic'];
$cover = $row['CoverPic'];


if (isset($_POST['passUpdate'])) {
    $newPass = trim($_POST['newPass']);
    $oldPass = trim($_POST['oldPass']);

    $sql = 'select Password from user where ID=' . $_SESSION['ID'];
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($oldPass == $row['Password']) {
        $sql = 'update user set Password = "' . $newPass . '" where ID=' . $_SESSION['ID'];
        mysqli_query($link, $sql);
    } else {
        echo '<script>alert("Incorrect old password insert!")</script>';
    }
}

if (isset($_POST['emailUpdate'])) {
    $newEmail = trim($_POST['newEmail']);
    $oldEmail = trim($_POST['oldEmail']);

    if ($oldEmail == $_SESSION['Email']) {
        $sql = 'select Email from user where Email="' . $newEmail . '"';
        $result = mysqli_query($link, $sql);
        $count = mysqli_num_rows($result);

        if ($count == 0) {
            $sql = 'update user set Email = "' . $newEmail . '" where ID=' . $_SESSION['ID'];
            mysqli_query($link, $sql);
        } else {
            echo '<script>alert("New email already exist!")</script>';
        }
    } else {
        echo '<script>alert("Incorrect old email insert!")</script>';
    }
}

if (isset($_POST['update'])) {
    $bio = trim($_POST['bio']);
    $work = trim($_POST['work']);
    $study = trim($_POST['study']);
    $live = trim($_POST['live']);

    // Insert sql for update details
    $sql = 'update user set Bio="' . $bio . '", Work="' . $work . '", Study="' . $study . '", Lives="' . $live . '" where ID=' . $_SESSION['ID'];
    mysqli_query($link, $sql);
    header('Location: my-profile.php');
}

if (isset($_POST['coverPicture'])) {
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
    $sql = 'update user set CoverPic="' . $fileDestination . '" where ID="' . $_SESSION["ID"] . '"';
    mysqli_query($link, $sql);
    header('Location: my-profile.php');
}

if (isset($_POST['profilePicture'])) {
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
    $sql = 'update user set ProfilePic="' . $fileDestination . '" where ID="' . $_SESSION["ID"] . '"';
    mysqli_query($link, $sql);
    header('Location: my-profile.php');
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

    $allowed = array('jpg', 'jpeg', 'png');
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
    $sql = 'INSERT into post (Title, Approved, User_ID, Cat_ID, Description, Image, DateTime) values ("' . $title . '","0", "' . $_SESSION['ID'] . '", "' . $catID . '", "' . $des . '", "' . $fileDestination . '", "' . date_format($date, "d-m-Y") . '")';
    mysqli_query($link, $sql);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

    <div class="user-profile-area">
        <div class="user-profile-top">
            <div class="cover-photo">
                <img src="<?php echo $cover?>" alt="picture" class="img-fluid">
                <div class="cover-photo-overlay">
                    <a href="#edit-profile"><i class="fas fa-camera"></i><span><b>Change Cover Photo</b></span></a>
                </div>
            </div>
            <div class="profile-photo">
                <img src="<?php echo $profile?>" alt="picture" class="img-fluid">
                <div class="profile-photo-overlay">
                    <a href="#edit-profile"> <i class="fas fa-camera"></i> </a>
                </div>
            </div>
            <div class="user-name">
                <h2><?php echo $_SESSION['Username'] ?></h2>
            </div>
            <div class="profile-menu">
                <ul class="nav justify-content-center">
                    <li><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
                    <li><a onclick="hideFunction('add-post')"><i class="fas fa-plus-square"></i>Add Post</a></li>
                    <li><a onclick="hideFunction('save')"><i class="fas fa-bookmark"></i>Saved</a></li>
                    <li><a onclick="hideFunction('ownpost')"><i class="fas fa-notes-medical"></i>My Post</a></li>
                    <li><a onclick="hideFunction('edit-profile')"><i class="fas fa-user-edit"></i>Edit Profile</a></li>
                    <li><a onclick="hideFunction('settings')"><i class="fas fa-cog"></i>Settings</a></li>

                </ul>
            </div>
        </div>
        <div class="user-profile-bottom">
            <div class="row">
                <div class="col-md-3">
                    <div class="user-details">
                        <div class="user-intro">
                            <span>
                                <i class="fas fa-globe"></i>
                                <h5>Introduction</h5>
                            </span>
                            <p>“<?php echo $bio ?>”</p>
                            <button><a href="#edit-profile">Edit Bio</a></button>
                        </div>
                        <div class="uesr-detail">
                            <div class="user-work">
                                <i class="fas fa-briefcase"></i>
                                <?php if ($work == "") {
                                    echo "<p>Add your work details</p>";
                                } else {
                                    echo '<p>Work at ' . $work . '</p>';
                                } ?>
                            </div>

                            <div class="user-studies">
                                <i class="fas fa-graduation-cap"></i>
                                <?php if ($study == "") {
                                    echo "<p>Add your study details</p>";
                                } else {
                                    echo '<p>Study at ' . $study . '</p>';
                                } ?>
                            </div>

                            <div class="user-address">
                                <i class="fas fa-home"></i>
                                <?php if ($live == "") {
                                    echo "<p>Add your address</p>";
                                } else {
                                    echo '<p>Lives at ' . $live . '</p>';
                                } ?>
                            </div>
                            <button><a href="#edit-profile">Edit Details</a></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="Add-post" id="add-post">
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
                    <div class="save-post" id="save">
                        <div class="admin-section-title">
                            <h2>Saved</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="post-content">
                                    <div class="post-content-img">
                                        <img src="lib/image/popular 1.jpg" class="img-fluid" alt="picture">
                                    </div>
                                    <div class="post-content-btn">
                                        <a href="#"> <b>Category</b> </a>
                                    </div>
                                    <div class="post-content-title">
                                        <a href="#">
                                            <h3>This is the Title</h3>
                                        </a>
                                    </div>
                                    <div class="post-content-date">
                                        <a href="#">Time</a> / <a href="#">Author</a>
                                    </div>
                                    <div class="post-content-description">
                                        <p class="el">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque nihil, odio ratione delectus magni autem alias inventore labore excepturi eum quas ad praesentium tempora porro beatae vitae sequi assumenda illum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Own-post" id="ownpost">
                        <div class="admin-section-title">
                            <h2>My Post</h2>
                        </div>
                        <div class="row">

                            <?php
                            $sql = 'select * from post where Approved="1" and User_ID=' . $_SESSION['ID'];
                            $result = mysqli_query($link, $sql);
                            $count = mysqli_num_rows($result);

                            if ($count == 0) {
                                ?>
                                <p>No post available/approved</p>
                                <?php
                            }
                            while ($row = mysqli_fetch_array($result)) {

                                $catSql = "select Name from category where Cat_ID=" . $row["Cat_ID"];
                                $catResult = mysqli_query($link, $catSql);
                                $catName = mysqli_fetch_array($catResult);

                                $sql = 'select Username, UserType from user where ID="' . $row['User_ID'] . '"';
                                $userRes = mysqli_query($link, $sql);
                                $userRow = mysqli_fetch_array($userRes);

                                $who = '';
                                if ($userRow['UserType'] == "Admin") $who = 'Admin';
                                else $who = $userRow['Username'];
                            ?>

                                <!-- Post -->
                                <div class="col-md-6">
                                    <div class="post-content">
                                        <div class="post-content-img">
                                            <img src="<?php echo $row['Image'] ?>" class="img-fluid" alt="picture">
                                        </div>
                                        <div class="post-content-btn">
                                            <a href="#"> <b><?php echo $catName['Name'] ?></b> </a>
                                        </div>
                                        <div class="post-content-title">
                                            <a href="single.php?pid=<?php echo $row['Post_ID'] ?>">
                                                <h3><?php echo $row['Title'] ?></h3>
                                            </a>
                                        </div>
                                        <div class="post-content-date">
                                            <a href="#"><?php echo $row['DateTime'] ?></a> / <a href="#"><?php echo $who ?></a>
                                        </div>
                                        <div class="post-content-description">
                                            <p class="el"><?php echo $row['Description'] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Post End -->
                            <?php
                            } ?>
                        </div>
                    </div>
                    <div class="Edit-profile" id="edit-profile">
                        <div class="admin-section-title">
                            <h2>Edit Profile</h2>
                        </div>
                        <div class="edit-profile-photo">
                            <form method="post" enctype="multipart/form-data">
                                <h4>Change Profile Photo</h4>
                                <input type="file" name="file" alt="profile-picture">
                                <div class="edit-profile-btn">
                                    <button type="submit" name="profilePicture">Save</button>
                                </div>
                            </form>
                        </div>
                        <div class="edit-cover-photo">
                            <form method="post" enctype="multipart/form-data">
                                <h4>Change Cover Photo</h4>
                                <input type="file" name="file" alt="cover-picture">
                                <div class="edit-profile-btn">
                                    <button type="submit" name="coverPicture">Save</button>
                                </div>
                            </form>
                        </div>
                        <form method="post">
                            <div class="edit-profile-details">
                                <h4>Change Biography</h4>
                                <input type="text" name="bio" value="<?php echo $bio ?>" maxlength="100" placeholder="Maximum letter 100">

                                <label for="work">Where You Work</label>
                                <input type="text" name="work" value="<?php echo $work ?>" placeholder="Work at" maxlength="30">

                                <label for="study">Where You Study</label>
                                <input type="text" name="study" value="<?php echo $study ?>" placeholder="Studied at" maxlength="30">

                                <label for="live">Where You Live</label>
                                <input type="text" name="live" value="<?php echo $live ?>" placeholder="Lives in" maxlength="30">
                            </div>
                            <div class="edit-profile-btn">
                                <button type="submit" name="update">Update</button>
                            </div>
                        </form>

                    </div>

                    <!-- Email & Password Update -->
                    <div class="edit-settings" id="settings">
                        <div class="admin-section-title">
                            <h2>Settings</h2>
                        </div>
                        <div class="change-email">
                            <form method="post">
                                <label for="mail">Enter Your Email</label>
                                <input type="email" name="oldEmail" id="mail" placeholder="Enter Email" required>

                                <label for="mail2">Enter Your New Email</label>
                                <input type="email" name="newEmail" id="mail2" placeholder="Enter New Email" required> <br><br>

                                <button type="submit" name="emailUpdate">Update</button>
                            </form>
                        </div>

                        <div class="change-pass">
                            <form method="post">
                                <label for="pass">Enter Your Password</label>
                                <input class="active" name="oldPass" type="password" id="pass" placeholder="Old Password" required>
                                <i id="icon" class="fa fa-eye-slash"></i>


                                <label for="pass2">Enter Your New Password</label>
                                <input class="active" name="newPass" type="password" id="pass2" placeholder="New Password" required>
                                <i id="icon2" class="fa fa-eye-slash"></i>
                                <br>
                                <br>

                                <button type="submit" name="passUpdate">Update</button>
                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>







    <div class="arrow-top"> <i class="fas fa-arrow-up"></i> </div>

    <script>
        var inputPass = document.getElementById('pass'),
            icon = document.getElementById('icon');

        icon.onclick = function() {

            if (inputPass.className == 'active') {
                inputPass.setAttribute('type', 'text');
                icon.className = 'fa fa-eye';
                inputPass.className = '';

            } else {
                inputPass.setAttribute('type', 'password');
                icon.className = 'fa fa-eye-slash';
                inputPass.className = 'active';
            }

        }
    </script>
    <script>
        var inputPass2 = document.getElementById('pass2'),
            icon2 = document.getElementById('icon2');

        icon2.onclick = function() {

            if (inputPass2.className == 'active') {
                inputPass2.setAttribute('type', 'text');
                icon2.className = 'fa fa-eye';
                inputPass2.className = '';

            } else {
                inputPass2.setAttribute('type', 'password');
                icon2.className = 'fa fa-eye-slash';
                inputPass2.className = 'active';
            }

        }
    </script>

    <script>
        function hideFunction(textID) {

            console.log(textID);

            document.getElementById("add-post").style.display = "none";

            var x = document.getElementById("save");
            x.style.display = "none";

            x = document.getElementById("ownpost");
            x.style.display = "none";

            x = document.getElementById("edit-profile");
            x.style.display = "none";

            x = document.getElementById("settings");
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
    <script src="JS/wow.min.js"></script>
    <script src="JS/main.js"></script>
    <script src="JS/customs.js"></script>
    <script>
        new WOW().init();
    </script>

    <!-- link-area-end -->

</body>

</html>