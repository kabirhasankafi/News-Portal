<!-- header-area-start -->
<header class="NP-header-area">
    <div class="header-top">
        <div class="row">
            <div class="col-md-4">
                <div class="date-area" onload="calender();">
                    <i class="far fa-calendar-alt"></i>
                    <span id="NPdate"></span>
                </div>
            </div>
            <div class="col-md-8">
                <div class="header-top-right">
                    <ul class="nav justify-content-end">

                        <?php if (isset($_SESSION['ID'])) {
                            echo '<li><a href="my-profile.php"> <i class="fas fa-user-circle" id="user-profile"></i> </a></li>';
                            echo '<li><a href="my-profile.php">' . $_SESSION["Username"] . '</a></li>';
                        ?>
                            <li><span></span></li>
                        <?php
                        } else {
                            echo '<li><a href="login-signup.php"><i class="fas fa-user-circle" id="user-profile"></i></a></li>';
                        } ?>

                        <?php if (isset($_SESSION['UserType']) && $_SESSION['UserType'] == 'Admin')
                            echo '<li><a href="admin.php">Admin</a></li>';
                        ?>
                        <li><span></span></li>
                        <?php if (!isset($_SESSION['ID'])) { ?>
                            <li><a href="login-signup.php">Log In</a></li>
                            <li><span></span></li>
                            <li><a href="login-signup.php">Sign Up</a></li>
                        <?php } ?>

                        <?php
                        if (isset($_SESSION['ID'])) {
                            echo '<li><a href="logout.php">Log Out</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="header-logo">
        <div class="row">
            <div class="col-md-4">
                <div class="logo-area">
                    <img src="lib/image/logo.png" class="img-fluid" alt="picture">
                    <p>Site description</p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="advertisement-area">
                    <img src="lib/image/sample-add.jpg" class="img-fluid" alt="picture">
                </div>
            </div>
        </div>
    </div>

    <div class="header-menu" id="navbar">
        <div class="row">
            <div class="col-md-8">
                <div class="main-menu">
                    <ul class="nav justify-content-end">
                        <li><a href="index.php">home</a></li>

                        <?php
                        $sql = 'select * from category where View="Menu"';
                        $run = mysqli_query($link, $sql);

                        while ($row = mysqli_fetch_assoc($run)) {
                            echo '<li><a href="page.php?cat=' . $row['Name'] . '&cid=' . $row['Cat_ID'] . '">' . $row['Name'] . '</a></li>';
                        }
                        ?>

                        <li><a href="contact.php">contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wrapper">
                    <div class="search-box">
                        <form action="search-result.php" method="GET">
                            <input type="text" name="search" placeholder="Search Here">
                            <div class="btn">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<!-- header-area-end -->