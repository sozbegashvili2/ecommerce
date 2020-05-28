<h1 style="margin-top: 30px;margin-left: 30px;">Products</h1>
<div class="container" id="contain" style="display: flex;flex-wrap: wrap;margin-top: 50px;">
    <?php foreach ($result as $key => $value): ?>
    <div class="col-sm-4">
        <div class="thumb-wrapper">
            <div class="img-box">
                <img src="<?php echo $value['productImg']?>" class="img-responsive img-fluid" alt="">
            </div>
            <form action="#">
                <div class="thumb-content">
                    <a style="text-decoration: none" href="/products?id=<?php echo $value['id'];?>"><h4 style="font-size: 17px"><?php echo $value['productName'] ?></h4></a>
                    <a style="color: #000;text-decoration: none" href="/products?id=<?php echo $value['id'];?>"><p><?php echo $value['productDes']; ?></p></a>
                    <div class="des">
                        <span style="margin-left: 16px" class="item-price" id="spn">$<?php echo $value['productPrice'] ?></span>
                        <div class="btnbut">
                            <button style="margin-right: 10px" id="btn-cart"><i style="font-size: 12px;" class="fa fa-shopping-cart"></i></button>
                            <button id="btn-wish"><i style="font-size: 12px;" class="fa fa-heart"></i></button>
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
            echo "<li class='page-item'><a class='page-link' href='{$this->request->requestUri}&page={$i}'>$i</a></li>";
         }
        ?>
    </ul>
</nav>