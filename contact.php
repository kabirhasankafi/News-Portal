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
   
<?php include 'zzz-header.php';?>
    
<!-- header-area-end -->

<!-- contact-area-start -->

<div class="fixed-background">
  <div class="overlay-fixed">
    <h1 class="wow zoomIn">Contact Us</h1>
  </div>
</div>






<section class="contact sp-140" id="contact">
    
     <div class="section-style"></div>
        <div class="info-content">
            <div class="col-40 col-100 wow slideInLeft">
                <div class="contact-info">
                    <h5>our Address</h5>
                    <p>123, Atish Diponkar Street, North Mugdha,  <br>Dhaka-1214</p>
                    <h5>Call Us</h5>
                    <p>+088 01871-014739<br>
                        +088 01726-023205</p>
                    <h5>Email Us</h5>
                    <p class="m-0">thedailynews@gmail.com</p>
                </div>
            </div>
            <div class="col-60 col-100 wow slideInRight">
                <form action="">
                    <input class="form-control" type="text" placeholder="Name">
                    <input class="form-control" type="email" placeholder="Email">
                    <input class="form-control" type="text" placeholder="Subject">
                    <textarea class="form-control" name="" id="" cols="10" rows="5" placeholder="message"></textarea>
                    <input class="mb-0" type="submit" value="send message"> </form>
            </div>
        </div>
   
</section>
<div class="contact-map">
        <div class="main-stories-category">
                <h6>LOCATION</h6>
                
            </div>
        <div class="row">
            <div class="col-md-12">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.772091764013!2d90.40078191445663!3d23.791128793137293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7a1f33e7d81%3A0xa7d45a97b942ae04!2sCanadian%20University%20of%20Bangladesh!5e0!3m2!1sen!2sbd!4v1572107655260!5m2!1sen!2sbd" frameborder="10" style="border:5;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    
</div>


<!-- contact-area-end -->

<!-- last-area-end -->
<?php include 'zzz-footer.php';?>

<div class="arrow-top"> <i class="fas fa-arrow-up"></i> </div>

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