<?php
session_start();
if(!isset($_SESSION['ID'])){
    header('Location: 404.php');
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
            <img src="lib/image/cover.jpg" alt="picture" class="img-fluid">
            <div class="cover-photo-overlay">
            <a href="#edit-profile"><i class="fas fa-camera"></i><span><b>Change Cover Photo</b></span></a>
            </div>
        </div>
        <div class="profile-photo">
            <img src="lib/image/profile.jpg" alt="picture" class="img-fluid">
            <div class="profile-photo-overlay">
           <a href="#edit-profile"> <i class="fas fa-camera"></i> </a>
            </div>
        </div>
        <div class="user-name">
                <h2>User Name</h2>
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
                        <p>“I'm passionate about learning. I'm passionate about life.”</p>
                        <button><a href="#edit-profile">Edit Bio</a></button>
                    </div>
                    <div class="uesr-detail">
                        <div class="user-work">
                              <i class="fas fa-briefcase"></i>
                              <p>Work at Fiverr</p>
                        </div>
                        <div class="user-studies">
                              <i class="fas fa-graduation-cap"></i>
                              <p>Studied at Academy</p>
                        </div>
                        <div class="user-address">
                              <i class="fas fa-home"></i>
                              <p>Lives in Address </p>
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
                                    <div class="Add-text">
                                        <label for="add-text"><b>Add Description</b></label> <br>
                                        <textarea id="add-text" name="description" placeholder="Enter Your Description...."></textarea>
                                    </div>
                                    <div class="add-catagory">
                                        <label for="add-catagory"><b>Add Category</b></label>
                                        <select name="category">
                                            <option value="" disabled selected> Select Category</option>
                                
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
                 <div class="Edit-profile" id="edit-profile">
                                <div class="admin-section-title">
                                    <h2>Edit Profile</h2>
                                </div>
                        <div class="edit-profile-photo">
                            <h4>Change Profile Photo</h4>
                            <input type="file" alt="profile-picture">
                        </div>
                        <div class="edit-cover-photo">
                            <h4>Change Cover Photo</h4>
                            <input type="file" alt="cover-picture">
                        </div>
                        <div class="edit-biography">
                            <h4>Change Biography</h4> 
                            <input type="text" maxlength="100" placeholder="Maximum letter 100">
                        </div>
                        <div class="edit-profile-details">
                            <label for="work">Where You Work</label>
                            <input type="text" placeholder="Work at" maxlength="30"> 
                            <label for="study">Where You Study</label>
                            <input type="text" placeholder="Studied at" maxlength="30">
                            <label for="live">Where You Live</label>
                            <input type="text" placeholder="Lives in" maxlength="30">
                        </div>
                        <div class="edit-profile-btn">
                            <button><a href="">Cencel</a></button>
                            <button><a href="">Save</a></button>
                        </div>
                        

                 </div>
                 <div class="edit-settings" id="settings">
                                 <div class="admin-section-title">
                                    <h2>Settings</h2>
                                </div>
                          <div class="change-email">
                             <form action="">
                                  <label for="mail">Enter Your Email</label>
                                  <input type="email" id="mail" placeholder="Enter Email" required>
                                  <label for="mail">Enter Your New Email</label>
                                  <input type="email" id="mail" placeholder="Enter Email" required> <br><br>
                                  <button><a href="">Cencel</a></button>
                                  <button><a href="">Update</a></button>
                             </form>
                          </div>

                         <div class="change-pass">
                            <form action="">
                            <label for="pass">Enter Your Password</label>
                            <input class="active" type="password" id="pass" placeholder="Password" required>
                            <i id="icon" class="fa fa-eye-slash"></i>
                           
                            
                            <label for="pass2">Enter Your New Password</label>
                            <input class="active" type="password" id="pass2" placeholder="Password" required>
                            <i id="icon2" class="fa fa-eye-slash"></i>
                              <br>
                              <br>

                           
                            <button><a href="">Cencel</a></button>
                            <button><a href="">Update</a></button>
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
 
   icon.onclick = function () {
 
     if(inputPass.className == 'active') {
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
 
   icon2.onclick = function () {
 
     if(inputPass2.className == 'active') {
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