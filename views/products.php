<?php
if (!$result) {
    header('Location:/404');
}
$btn = $this->request->getBody() ?? false;
if(sizeof($btn) > 1 and $btn){
    $this->addToCart($btn);
}
?>

<div class="container" style="margin-top: 40px;">

    <div class="card">
        <div class="row">
            <aside class="col-sm-5 border-right">
                <article class="gallery-wrap">
                    <div class="img-big-wrap">
                        <div> <a href="#"><img style="width: 100%" <?php echo 'src="' .$result['productImg'].'"' ?> ></a></div>
                    </div> <!-- slider-product.// -->
                </article> <!-- gallery-wrap .end// -->
            </aside>
            <aside class="col-sm-7">
                <article class="card-body p-5">
                    <form action="" method="get">
                    <h3 class="title mb-3"><?php echo $result['productName'] ?></h3>
                   <input type="hidden" name="id" value="<?php echo $result['id']?>">
                        <input type="hidden" name="name" value="<?php echo $result['productName']?>">
                        <input type="hidden" name="price" value="<?php echo $result['productPrice']?>">
                        <input type="hidden" name="image" value="<?php echo $result['productImg']?>">
                    <p class="price-detail-wrap">
	<span class="price h3 text-warning">
		<span class="currency">$</span><span class="num"><?php echo $result['productPrice'] ?></span>
	</span>

                    </p> <!-- price-detail-wrap .// -->
                    <dl class="item-property">
                        <dt>Description</dt>
                        <dd><p><?php echo $result['productDesc'] ?></p></dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <dl class="param param-inline">
                                <dt>Quantity: </dt>
                                <dd>
                                    <select name="quantity" class="form-control form-control-sm" style="width:70px;">
                                        <?php
                                        for ($i = 1;$i <= $result['productQuantity'];$i++) {
                                            echo '<option>'.$i.'</option>';
                                        }
                                        ?>
                                    </select>
                                </dd>
                            </dl>  <!-- item-property .// -->
                        </div> <!-- col.// -->

                    </div> <!-- row.// -->
                    <hr>
                    <a href="#" class="btn btn-lg btn-primary text-uppercase"> Add to wishlist </a>
                    <button type="submit" class="btn btn-lg btn-outline-primary text-uppercase"><i class="fas fa-shopping-cart"></i> Add to cart</button>
                    </form>
                </article> <!-- card-body.// -->
            </aside> <!-- col.// -->
        </div> <!-- row.// -->
    </div> <!-- card.// -->


</div>


