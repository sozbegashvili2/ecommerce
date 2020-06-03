<?php
$product = $this->request->getBody();
if (isset($product['product'])) {
    $requestUri = "/filtproducts?product={$product['product']}";
}
else
    if (isset($product['brand'])) {
        $requestUri = "/filtproducts?brand={$product['brand']}";
    }
if ($product and sizeof($product) > 1 and isset($product['addCart'])) {
    $this->addToCart($product);
    header("Location:{$requestUri}");
}
if ($product and sizeof($product) > 1 and isset($product['addWish'])) {
    $this->addToWish($product);
    header("Location:{$requestUri}");
}
?>
<h1 style="margin-top: 30px;margin-left: 30px;">Products</h1>
<?php if ($result) { ?>
<div class="container" id="contain" style="display: flex;flex-wrap: wrap;margin-top: 50px;">
    <?php foreach ($result as $key => $value): ?>
        <div class="col-sm-4">
            <div class="thumb-wrapper">
                <div class="img-box">
                    <img src="<?php echo $value['productImg']?>" class="img-responsive img-fluid" alt="">
                </div>
                <form action="" method="get">
                    <input type="hidden" name="<?php
                    if (isset($product['product'])) {
                        echo 'product';
                    }
                    else if(isset($product['brand'])) {
                        echo 'brand';
                    }
                    ?>" value="<?php
                    if (isset($product['product'])) {
                        echo $product['product'];
                    }
                    else if(isset($product['brand']))
                    {
                        echo $product['brand'];
                    }
                    ?>">
                    <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                    <input type="hidden" name="name" value="<?php echo $value['productName'] ?>">
                    <input type="hidden" name="price" value="<?php echo $value['productPrice'] ?>">
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="image" value="<?php echo $value['productImg'] ?>">
                    <input type="hidden" name="description" value="<?php echo $value['productDes']?>">
                    <div class="thumb-content">
                        <a style="text-decoration: none" href="/products?id=<?php echo $value['id'];?>"><h4 style="font-size: 17px"><?php echo $value['productName'] ?></h4></a>
                        <a style="color: #000;text-decoration: none" href="/products?id=<?php echo $value['id'];?>"><p><?php echo $value['productDes']; ?></p></a>
                        <div class="des">
                            <span style="margin-left: 16px" class="item-price" id="spn">$<?php echo $value['productPrice'] ?></span>
                            <div class="btnbut">
                                <button name="addCart" type="submit" style="margin-right: 10px" id="btn-cart"><i style="font-size: 12px;" class="fa fa-shopping-cart"></i></button>
                                <button name="addWish" type="submit" id="btn-wish"><i style="font-size: 12px;" class="fa fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<nav aria-label="Page navigation example">
    <ul class="pagination"  style="margin-left: 40%">
        <?php
        for ($i = 1;$i<=$numberOfPages;$i++) {
            echo "<li class='page-item'><a class='page-link' href='{$requestUri}&page={$i}'>$i</a></li>";
        }
        ?>
    </ul>
</nav>
<?php }
else
    echo "<div style='margin-top: 40px' class='container alert alert-danger'>Products Not Found</div>";
?>
