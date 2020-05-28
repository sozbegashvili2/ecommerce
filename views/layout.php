<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechPower</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/layout.css">
    <?php
    if ($this->request->getPath() === '/login') echo '<link rel="stylesheet" href="css/login.css">';
  elseif ($this->request->getPath() === '/register') echo '<link rel="stylesheet" href="css/register.css">';
  elseif ($this->request->getPath() === '/filtproducts') echo '<link rel="stylesheet" href="css/filtered-products.css">';


  ?>
</head>
<body>
<script src="app.js"></script>
<div class="top-line">
    <div class="top-line-container">
        <a href="/wishlist" id="wish"><i class="fa fa-heart"></i> Wishlist (0)</a>
        <?php
        if(isset($_SESSION['currentUser'])) {
            echo '<div class="dropdownone">';
            echo  '<button onclick="myFunction()" class="dropbtnone"><i class="fa fa-user"></i>'.$_SESSION['currentUser'].'</button>';
            echo '<div id="myDropdownone" class="dropdown-contentone">';
            echo  '<a href="/logout">Logout</a>';
            echo  '</div>';
            echo '</div>';
        } else
        {
          echo '<div class="dropdownone">';
          echo  '<button onclick="myFunction()" class="dropbtnone"><i class="fa fa-user"></i> My Account</button>';
          echo '<div id="myDropdownone" class="dropdown-contentone">';
          echo  '<a href="/login">Login</a>';
            echo '<a href="/register">Register</a>';
          echo  '</div>';
        echo '</div>';
        }
        ?>
        <a href="/cart" id="check"><i class="fa fa-share"></i> Checkout</a>
        <a href="https://www.facebook.com/zemezlab/"><i class="fab fa-facebook-f"></i></a>
        <a href="https://twitter.com/zemezlab"><i class="fab fa-twitter-square"></i></a>
        <a href="https://plus.google.com/"><i class="fab fa-google-plus-g"></i></a>
    </div>
</div>
<header id="main-header">
    <div class="logo">
        <a href="/">
            <img src="img/logo.png" alt="logo">
        </a>
    </div>
    <form action="#" method="get">
        <div class="search">
            <input type="text" name="search" placeholder="Search">
            <button type="submit"><span class="fa fa-search"></span></button>
        </div>
    </form>
</header>
<nav style="background: #232527">
    <div class="row" style="width: 100%;">
        <ul class="main-nav__items">
            <li class="main-nav__item"><a href="/filtproducts?product=cpu" class="main-nav__link">CPUS</a></li>
            <li class="main-nav__item"><a href="/filtproducts?product=cd/dvd" class="main-nav__link">CD/DVD Drives</a></li>
            <li class="main-nav__item"><a href="/filtproducts?product=motherboards" class="main-nav__link">Motherboards</a></li>
            <li class="main-nav__item"><a href="/filtproducts?product=harddrives" class="main-nav__link">Hard Drives</a></li>
            <li class="main-nav__item"><a href="/filtproducts?product=Monitors" class="main-nav__link">Monitors</a></li>
        </ul>
        <div class="dropdown">
            <button style="margin-left: 180px;" type="button" class="btn btn-info" data-toggle="dropdown">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">1</span>
            </button>
            <div class="dropdown-menu" id="drp">
                <div class="row cart-detail">
                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                        <img src="https://static.toiimg.com/thumb/msid-55980052,width-640,resizemode-4/55980052.jpg">
                    </div>
                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                        <p>Lenovo DSC-RX100M..</p>
                        <span class="price text-info"> $445.78</span> <span class="count"> Quantity:01</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                        <a id="drpchk" style="color: white;" href="/cart"><button class="btn btn-primary btn-block">Checkout</button></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</nav>
<?php echo $content; ?>
<footer id="main-footer">
    <div class="main-footer__categories">
        <h3>Categories</h3>
        <ul class="main-footer__categories--items" style="margin-top:-2px" >
            <li class="main-footer__categories--item"><a href="/filtproducts?product=cpu" class="item-link">CPUs</a></li>
            <li class="main-footer__categories--item"><a href="/filtproducts?product=cd/dvd" class="item-link">CD/DVD drives</a></li>
            <li class="main-footer__categories--item"><a href="/filtproducts?product=motherboards" class="item-link">Motherboards</a></li>
            <li class="main-footer__categories--item"><a href="/filtproducts?product=harddrives" class="item-link">Hard drives</a></li>
            <li class="main-footer__categories--item"><a href="/filtproducts?product=Monitors" class="item-link">Monitors</a></li>
        </ul>
    </div>
    <div class="main-footer__information">
        <h3>Information</h3>
        <ul class="main-footer__information--items">
            <li class="main-footer__information--item"><a href="#">About Us</a></li>
            <li class="main-footer__information--item"><a href="#">Delivery Information</a></li>
            <li class="main-footer__information--item"><a href="#">Privacy Policy</a></li>
            <li class="main-footer__information--item"><a href="#">Terms & Conditions</a></li>
        </ul>
    </div>
    <div class="contact-us">
        <h3>Contact Us</h3>
        <ul class="contact-us-items">
            <li class="contact-us-item"><a href="https://www.google.com/maps/?q=40.6700,+-73.9400">My Company Glasgow D04 89GR</a></li>
            <li class="contact-us-item"><a href="callto:+3(800) 2345-6789 ">+3(800) 2345-6789</a></li>
            <li class="contact-us-item"><a href="mailto:info@demolink.org">info@demolink.org</a></li>
            <li class="workdays">7 Days a week from 9:00 am to 7:00 pm</li>
        </ul>
    </div>
</footer>
<div class="copy">
    <p>TechPower &copy 2020 All rights Reserved</p>
</div>
</body>
</html>