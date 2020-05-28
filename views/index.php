<?php
$stmt = $this->database->pdo->prepare("SELECT id,productName,productPrice,productQuantity,SUBSTR(productDesc, 1, 99) as productDes,productImg FROM products ORDER BY REG_DATE DESC LIMIT 6");
$stmt->execute();
$result = $stmt->fetchAll();
$size = sizeof($result)/3;
$start = 0;
?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('img/image-1.png')">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="display-4">FIND ANY FORMS OF COMPUTER</h2>
                <p class="lead">HARDWARE YOU NEED</p>
            </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('img/slide-02-2050x580.png')">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="display-4">FIND ANY FORMS OF COMPUTER</h2>
                <p class="lead">HARDWARE YOU NEED</p>
            </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('img/slide-03-2050x580.png')">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="display-4">FIND ANY FORMS OF COMPUTER</h2>
                <p class="lead">HARDWARE YOU NEED</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container" id="contain">
    <div class="row">
        <div class="col-md-12">
            <h2>Latest Products</h2>
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                    <?php
                        for ($i = 0; $i < $size; $i++) {
                            if ($i == 0) {
                                echo ' <div class="item carousel-item active">';
                            }
                            else {
                                echo ' <div class="item carousel-item">';
                            }

                            echo '<div class="row">';
                            for ($j = $start; $j<$start+3;$j++) {
                                echo '<div class="col-sm-4">';
                                echo '<div class="thumb-wrapper">';
                                echo '<div class="img-box">';
                                echo "<img src='{$result[$j]['productImg']}' class='img-responsive img-fluid' alt=''>";
                                echo '</div>';
                                echo '<form action="#">';
                                echo '<div class="thumb-content">';
                                echo  "<a style='text-decoration: none' href='/products?id={$result[$j]['id']}'>".'<h4>'.$result[$j]['productName'].'</h4>'.'</a>';
                                echo  "<a style='text-decoration: none;color: #000' href='/products?id={$result[$j]['id']}'>".'<p>'.$result[$j]['productDes'].'</p>'.'</a>';
                                echo '<div class="des">';
                                echo '<span style="margin-left: 16px" class="item-price" id="spn">$'.$result[$j]['productPrice'].'</span>';
                                echo '<div class="btnbut">';
                                echo '<button style="margin-right: 10px" id="btn-cart"><i style="font-size: 12px;" class="fa fa-shopping-cart"></i></button>';
                                echo '<button id="btn-wish"><i style="font-size: 12px;" class="fa fa-heart"></i></button>';
                                 echo '</div>';
                                   echo '</div>';
                                    echo '</div>';
                                   echo '</form>';
                              echo  '</div>';
                           echo '</div>';
                            }
                        echo '</div>';
                         echo '</div>';
                         $start = $start+3;
                        }

                    ?>
                </div>
                <!-- Carousel controls -->
                <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<section id="product-overview">

    <div class="free-shipping">
        <i class="far fa-paper-plane"></i>
        <h1>Free Shipping</h1>
        <h3>an orders over 100$</h3>
    </div>
    <div class="fast-delivery">
        <i class="far fa-clock"></i>
        <h1>Fast Delivery</h1>
        <h3>Worldwide</h3>
    </div>
    <div class="big-choice">
        <i class="far fa-thumbs-up"></i>
        <h1>Big Choice</h1>
        <h3>of Products</h3>
    </div>
</section>
<h3 class="popular">Popular Brands</h3>
<section id="brands">
    <a href="/filtproducts?brand=Asus"><img src="img/asus.png"></a>
    <a href="/filtproducts?brand=Dell"><img src="img/dell.jpg"></a>
    <a href="/filtproducts?brand=hp"> <img src="img/hp.jpg"></a>
    <a href="/filtproducts?brand=htc"> <img src="img/HTC.png"></a>
    <a href="/filtproducts?brand=intel"><img src="img/intel.png"></a>
    <a href="/filtproducts?brand=microsoft"><img src="img/microsoft.jpg"></a>
</section>
