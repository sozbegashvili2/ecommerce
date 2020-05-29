<?php
$remove = $this->request->getBody();
$id = array_search(NULL,$remove);
unset($_SESSION['cart'][$id]);
$subtotal = 0;

?>

<?php
if (isset($_SESSION['cart']) && sizeof($_SESSION['cart']) > 0 ){
?>

    <div class="container" style="margin-top: 40px">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($_SESSION['cart'] as $key => $value): ?>
                        <tr>
                            <td class="col-sm-8 col-md-6">
                                <div class="media">
                                    <img class="media-object" src="<?php echo $value['image'] ?>" style="width: 72px; height: 72px;margin-right: 12px;">
                                    <div class="media-body">
                                        <h4 class="media-heading"><?php echo $value['name'] ?></h4>
                                    </div>
                                </div></td>
                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                <p class="form-control"><?php echo $value['quantity'] ?></p>
                            </td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>$<?php echo $value['price']?></strong></td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>$<?php echo $value['price']*$value['quantity']?></strong></td>
                            <td class="col-sm-1 col-md-1">
                                <form action="" method="get">
                                    <button name="<?php echo $value['id']?>" type="submit" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove"></span> Remove
                                    </button></td>
                            </form>
                        </tr>
                        <?php
                        $subtotal += $value['price']*$value['quantity'];
                        ?>
                    <?php endforeach; ?>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>$<?php echo $subtotal; ?></strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>$<?php echo $subtotal*1/100; ?></strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>$<?php echo $subtotal+$subtotal*1/100; ?></strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                            <a href="/" type="button" class="btn btn-default" style="margin-top: 0;">
                                Continue Shopping  <span class="glyphicon glyphicon-shopping-cart"></span>
                            </a></td>
                        <td>
                            <a <?php
                            if (isset($_SESSION['currentUser'])) {
                                echo 'href="/checkout"';
                            }
                            else
                            {
                                echo 'href="/login"';
                            }
                            ?> style="color:white" type="button" class="btn btn-success">
                                Checkout <span class="glyphicon glyphicon-play"></span>
                            </a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php }
else
{
    echo "<div style='margin-top:40px' class='container alert alert-danger'>Your cart is empty</div>";
}

?>
