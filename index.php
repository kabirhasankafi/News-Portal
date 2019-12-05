<?php
session_start();
include 'zzz-dbConnect.php';


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
    <header class="NP-header-area">

        <?php include 'zzz-header.php'; ?>


        <div class="header-news">
            <div class="top-stories-bar">

                <div class="row top-stories-box clearfix">
                    <div class="col-sm-auto">
                        <div class="top-stories-label">
                            <div class="top-stories-label-wrap"> <span class="flash-icon"></span> <span class="label-txt"> Top Stories </span></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm top-stories-lists">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="marquee">
                                    <marquee behavior="scroll" direction="left" onmouseover="this.stop()" onmouseout="this.start()">

                                        <?php
                                        $sql = 'select Post_ID, Title from post order by Post_ID DESC limit 5';
                                        $result = mysqli_query($link, $sql);

                                        while ($row = mysqli_fetch_array($result)) { ?>
                                            <a href="single.php?pid=<?php echo $row['Post_ID'] ?>"><?php echo $row['Title'] ?></a>
                                        <?php } ?>

                                    </marquee>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </header>

    <!-- header-area-end -->


    <!-- stories-area-star -->

    <div class="NP-stories-area">
        <div class="row no-gutters">
            <div class="col-md-6">
                <div class="main-stories-area">
                    <div class="main-stories-category">
                        <h6>Main Stories</h6>
                    </div>
                    <div class="main-stories-slider-area">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">

                                <?php
                                $sql = 'select * from Post where Cat_ID=1 order by Post_ID DESC LIMIT 1';
                                $result = mysqli_query($link, $sql);
                                $row = mysqli_fetch_array($result);

                                ?>
                                <div class="carousel-item active">
                                    <img src="lib/image/slider 1.jpg" class="d-block w-100" alt="picture">
                                    <div class="main-stories-btn">
                                        <a href="#"> <b>Category</b> </a> <a href="#"><b>Tag</b></a>
                                    </div>
                                    <div class="main-stories-title">
                                        <a href="#">
                                            <h3>Hong Kong protest leaders warn of threat to civil rights</h3>
                                        </a>
                                    </div>
                                    <div class="main-stories-date">
                                        <a href="#">Oct 13,2019</a>/<a href="#">Admin</a>
                                    </div>
                                </div>



                                <div class="carousel-item">
                                    <img src="lib/image/slider 1.jpg" class="d-block w-100" alt="picture">
                                    <div class="main-stories-btn">
                                        <a href="#"> <b>Category</b> </a> <a href="#"><b>Tag</b></a>
                                    </div>
                                    <div class="main-stories-title">
                                        <a href="#">
                                            <h3>Hong Kong protest</h3>
                                        </a>
                                    </div>
                                    <div class="main-stories-date">
                                        <a href="#">Oct 13,2019</a>/<a href="#">Admin</a>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <img src="lib/image/slider 1.jpg" class="d-block w-100" alt="picture">
                                    <div class="main-stories-btn">
                                        <a href="#"> <b>Category</b> </a> <a href="#"><b>Tag</b></a>
                                    </div>
                                    <div class="main-stories-title">
                                        <a href="#">
                                            <h3>Hong Kong protest leaders warn of threat to civil rights</h3>
                                        </a>
                                    </div>
                                    <div class="main-stories-date">
                                        <a href="#">Oct 13,2019</a>/<a href="#">Admin</a>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="false"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="editors-trending-area">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <div class="main-stories-category">
                                <h6>Editor's Pick</h6>
                            </div>
                            <div class="edidors-pick">
                                <?php

                                $sql = 'select * from post, user where Cat_ID=8 order by Post_ID desc limit 1';
                                $result = mysqli_query($link, $sql);
                                $row = mysqli_fetch_array($result);

                                $who = '';
                                if ($row['UserType'] == 'Admin') $who = 'Admin';
                                else $who = $row['Username'];
                                ?>
                                <div class="edidors-pick-img">
                                    <img src="<?php echo $row['Image'] ?>" class="img-fluid" alt="picture">
                                </div>
                                <div class="edidors-pick-btn">
                                    <a href="#"> <b>Editor's Pick</b> </a>
                                </div>
                                <div class="edidors-pick-title">
                                    <a href="single.php?pid=<?php echo $row['Post_ID'] ?>">
                                        <h3><?php echo $row['Title'] ?></h3>
                                    </a>
                                </div>
                                <div class="edidors-pick-date">
                                    <a href="#"><?php echo $row['DateTime'] ?></a>/<a href="#"><?php echo $who ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" id="trending-stories-area">

                            <div class="main-stories-category">
                                <h6>National</h6>
                            </div>
                            <?php
                            $sql = 'SELECT * FROM post, user where Cat_ID=1 and user.ID=post.User_ID order by Post_ID DESC LIMIT 2';
                            $result = mysqli_query($link, $sql);



                            while ($row = mysqli_fetch_array($result)) {
                                $who = '';
                                if ($row['UserType'] == 'Admin') $who = 'Admin';
                                else $who = $row['Username'];
                                ?>

                                <div class="trending-stories">

                                    <div class="trending-stories-img">
                                        <img src="<?php echo $row['Image'] ?>" class="img-fluid" alt="picture">
                                    </div>

                                    <div class="trending-stories-title">
                                        <a href="single.php?pid=<?php echo $row['Post_ID'] ?>">
                                            <h3><?php echo $row['Title'] ?></h3>
                                        </a>
                                    </div>
                                    <div class="trending-stories-date">
                                        <a href="#"><?php echo $row['DateTime'] ?></a>/<a href="#"><?php echo $who ?></a>
                                    </div>
                                </div>

                            <?php }
                            ?>
                            <!-- trending-stories2
                            <div class="trending-stories2">
                                <div class="trending-stories-img">
                                    <img src="lib/image/editors-pick-1.jpg" class="img-fluid" alt="picture">
                                </div>
                                <div class="trending-stories-btn">
                                    <a href="#"> <b>Category</b> </a> <a href="#"><b>Tag</b></a>
                                </div>
                                <div class="trending-stories-title">
                                    <a href="#">
                                        <h3>Best Classic Film Cameras</h3>
                                    </a>
                                </div>
                                <div class="trending-stories-date">
                                    <a href="#">Oct 13,2019</a>/<a href="#">Admin</a>
                                </div>
                            </div>   -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <!-- stories-area-end -->









    <!-- other-stories-sidebar-start -->
    <div class="NP-others-stories-area">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="main-stories-category">
                            <h6>Health</h6>
                        </div>
                        <div class="health-stories-area">

                            <?php
                            $sql = 'select * from post, user where Cat_ID=5 order by Post_ID desc limit 1';
                            $result = mysqli_query($link, $sql);
                            $row = mysqli_fetch_array($result);

                            $who = '';
                            if ($row['UserType'] == 'Admin') $who = 'Admin';
                            else $who = $row['Username'];
                            ?>

                            <div class="health-stories-img">
                                <img src="<?php echo $row['Image'] ?>" class="img-fluid" alt="picture">
                            </div>
                            <div class="health-stories-btn">
                                <a href="#"> <b>Health</b></a>
                            </div>
                            <div class="health-stories-title">
                                <a href="single.php?pid=<?php echo $row['Post_ID'] ?>">
                                    <h3><?php echo $row['Title'] ?></h3>
                                </a>
                            </div>
                            <div class="health-stories-date">
                                <a href="#"><?php echo $row['DateTime'] ?></a>/<a href="#"><?php echo $who ?></a>
                            </div>
                            <div class="health-stories-description">
                                <p><?php echo $row['Description'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main-stories-category">
                            <h6>Technology</h6>
                        </div>
                        <div class="technology-stories-area">

                            <?php
                            $sql = 'select * from post, user where Cat_ID=6 order by Post_ID desc limit 1';
                            $result = mysqli_query($link, $sql);
                            $row = mysqli_fetch_array($result);

                            $who = '';
                            if ($row['UserType'] == 'Admin') $who = 'Admin';
                            else $who = $row['Username'];
                            ?>

                            <div class="technology-stories-img">
                                <img src="<?php echo $row['Image'] ?>" class="img-fluid" alt="picture">
                            </div>
                            <div class="technology-stories-btn">
                                <a href="#"> <b>Technology</b> </a>
                            </div>
                            <div class="technology-stories-title">
                                <a href="single.php?pid=<?php echo $row['Post_ID'] ?>">
                                    <h3><?php echo $row['Title'] ?></h3>
                                </a>
                            </div>
                            <div class="technology-stories-date">
                                <a href="#"><?php echo $row['DateTime'] ?></a>/<a href="#"><?php echo $who ?></a>
                            </div>
                            <div class="technology-stories-description">
                                <p><?php echo $row['Description'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="sports-stories-area">
                    <div class="main-stories-category">
                        <h6>Sports</h6>
                    </div>
                    <div class="sports-area">
                        <?php
                        $sql = 'select * from post, user where Cat_ID=3 order by Post_ID desc limit 1';
                        $result = mysqli_query($link, $sql);
                        $row = mysqli_fetch_array($result);

                        $who = '';
                        if ($row['UserType'] == 'Admin') $who = 'Admin';
                        else $who = $row['Username'];
                        ?>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="sports-stories-img">
                                    <img src="<?php echo $row['Image'] ?>" class="img-fluid" alt="picture">
                                </div>
                            </div>
                            <div class="col-md-6" id="sports-details">
                                <div class="sports-stories-btn">
                                    <a href="#"> <b>Sports</b> </a>
                                </div>
                                <div class="sports-stories-title">
                                    <a href="single.php?pid=<?php echo $row['Post_ID'] ?>">
                                        <h3><?php echo $row['Title'] ?></h3>
                                    </a>
                                </div>
                                <div class="sports-stories-date">
                                    <a href="#"><?php echo $row['DateTime'] ?></a>/<a href="#"><?php echo $who ?></a>
                                </div>
                                <div class="sports-stories-description">
                                    <p><?php echo $row['Description'] ?></p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


            </div>
            <div class="col-md-4">
                <div class="main-stories-category">
                    <h6>Weather Update</h6>
                </div>
                <div class="weather-area">
                    <a class="weatherwidget-io" href="https://forecast7.com/en/23d8190d41/dhaka/" data-label_1="DHAKA" data-label_2="WEATHER" data-theme="weather_one">DHAKA WEATHER</a>
                    <script>
                        ! function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (!d.getElementById(id)) {
                                js = d.createElement(s);
                                js.id = id;
                                js.src = 'https://weatherwidget.io/js/widget.min.js';
                                fjs.parentNode.insertBefore(js, fjs);
                            }
                        }(document, 'script', 'weatherwidget-io-js');
                    </script>
                </div>

                <div class="video-area">
                    <div class="main-stories-category">
                        <h6>Latest Video</h6>
                    </div>
                    <iframe src="https://www.youtube.com/embed/134t1VvgrIw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <iframe src="https://www.youtube.com/embed/zyKwny_sQE8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                </div>
            </div>
        </div>
    </div>


    <!-- other-stories-sidebar-end -->







    <!-- popular-stories-area-start -->

    <div class="NP-popular-stories-area">
        <div class="main-stories-category">
            <h6>Popular Stories</h6>
        </div>
        <div class="popular-stories-slider">
            <div class="owl-carousel owl-theme">
                <div id="item" class="popular-items">
                    <div class="popular-stories-img">
                        <img src="lib/image/editors-pick-1.jpg" class="img-fluid" alt="picture">
                    </div>
                    <div class="popular-stories-btn">
                        <a href="#"> <b>Category</b> </a> <a href="#"><b>Tag</b></a>
                    </div>
                    <div class="popular-stories-title">
                        <a href="#">
                            <h3>Best Classic Film Cameras</h3>
                        </a>
                    </div>
                    <div class="popular-stories-date">
                        <a href="#">Oct 13,2019</a>/<a href="#">Admin</a>
                    </div>
                </div>
                <div id="item" class="popular-items">
                    <div class="popular-stories-img">
                        <img src="lib/image/editors-pick-1.jpg" class="img-fluid" alt="picture">
                    </div>
                    <div class="popular-stories-btn">
                        <a href="#"> <b>Category</b> </a> <a href="#"><b>Tag</b></a>
                    </div>
                    <div class="popular-stories-title">
                        <a href="#">
                            <h3>Best Classic Film Cameras</h3>
                        </a>
                    </div>
                    <div class="popular-stories-date">
                        <a href="#">Oct 13,2019</a>/<a href="#">Admin</a>
                    </div>
                </div>
                <div id="item" class="popular-items">
                    <div class="popular-stories-img">
                        <img src="lib/image/editors-pick-1.jpg" class="img-fluid" alt="picture">
                    </div>
                    <div class="popular-stories-btn">
                        <a href="#"> <b>Category</b> </a> <a href="#"><b>Tag</b></a>
                    </div>
                    <div class="popular-stories-title">
                        <a href="#">
                            <h3>Best Classic Film Cameras</h3>
                        </a>
                    </div>
                    <div class="popular-stories-date">
                        <a href="#">Oct 13,2019</a>/<a href="#">Admin</a>
                    </div>
                </div>
                <div id="item" class="popular-items">
                    <div class="popular-stories-img">
                        <img src="lib/image/editors-pick-1.jpg" class="img-fluid" alt="picture">
                    </div>
                    <div class="popular-stories-btn">
                        <a href="#"> <b>Category</b> </a> <a href="#"><b>Tag</b></a>
                    </div>
                    <div class="popular-stories-title">
                        <a href="#">
                            <h3>Best Classic Film Cameras</h3>
                        </a>
                    </div>
                    <div class="popular-stories-date">
                        <a href="#">Oct 13,2019</a>/<a href="#">Admin</a>
                    </div>
                </div>
                <div id="item" class="popular-items">
                    <div class="popular-stories-img">
                        <img src="lib/image/editors-pick-1.jpg" class="img-fluid" alt="picture">
                    </div>
                    <div class="popular-stories-btn">
                        <a href="#"> <b>Category</b> </a> <a href="#"><b>Tag</b></a>
                    </div>
                    <div class="popular-stories-title">
                        <a href="#">
                            <h3>Best Classic Film Cameras</h3>
                        </a>
                    </div>
                    <div class="popular-stories-date">
                        <a href="#">Oct 13,2019</a>/<a href="#">Admin</a>
                    </div>
                </div>
                <div id="item" class="popular-items">
                    <div class="popular-stories-img">
                        <img src="lib/image/editors-pick-1.jpg" class="img-fluid" alt="picture">
                    </div>
                    <div class="popular-stories-btn">
                        <a href="#"> <b>Category</b> </a> <a href="#"><b>Tag</b></a>
                    </div>
                    <div class="popular-stories-title">
                        <a href="#">
                            <h3>Best Classic Film Cameras</h3>
                        </a>
                    </div>
                    <div class="popular-stories-date">
                        <a href="#">Oct 13,2019</a>/<a href="#">Admin</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- popular-stories-area-end -->



    <?php include 'zzz-footer.php'; ?>
    <!-- footer-area-end -->


    <div class="arrow-top"> <i class="fas fa-arrow-up"></i> </div>


    <!-- link-area-start -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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