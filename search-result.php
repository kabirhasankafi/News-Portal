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

    
      


        <div class="single-post-area">
            <div class="row">
                <div class="col-md-8">
                 
                
                </div>
            
            <div class="col-md-4">
                <div class="sidebar-area">
                    <div class="sidebar-category">
                        <h6>Category</h6>
                    </div>
                    <div class="sidebar-list">
                        <ul>
                            <?php
                            $sql = 'select * from category';
                            $run = mysqli_query($link, $sql);

                            while ($row = mysqli_fetch_assoc($run)) {
                                echo '<li><a href="page.php?cat=' . $row['Name'] . '&cid=' . $row['Cat_ID'] . '">>&nbsp;' . $row['Name'] . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="add">
                    <img src="lib/image/add.jpg" class="img-fluid" alt="picture">
                </div>
            </div>
            </div>
        </div>














        <!-- last-area-end -->
        <?php include 'zzz-footer.php'; ?>


        <!-- footer-area-end -->





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