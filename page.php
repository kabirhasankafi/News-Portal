<?php
include 'zzz-dbConnect.php';
session_start();



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

    <!-- NP-post-content-area-start -->
    <div class="NP-post-content-area">
        <div class="row">
            <div class="col-md-8">
                <div class="row">

                    <?php
                    $sql = 'select * from post where Approved="1" and Cat_ID=' . $_GET['cid'] . ' ORDER BY Post_ID DESC';
                    $result = mysqli_query($link, $sql);

                    $date = date_create();
                    $endDateTemp = date_format($date, "d-m-Y");
                    $end_date = strtotime($endDateTemp);

                    while ($row = mysqli_fetch_array($result)) {

                        $start_date = strtotime($row['DateTime']);

                        if (($end_date - $start_date) / 60 / 60 / 24 < 3) {

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
                                        <a href="#"> <b><?php echo $_GET['cat'] ?></b> </a>
                                    </div>
                                    <div class="post-content-title">
                                        <a href="single.php?pid=<?php echo $row['Post_ID']?>">
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
                    <?php }
                    } ?>
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


    <!-- NP-post-content-area-end -->










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