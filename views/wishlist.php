<h1 style="text-align: center;margin-top:30px">Your Wishlist</h1>
    <div class="row" style="margin-top: 20px">
        <div class="col-lg-8 mx-auto">

            <!-- List group-->
            <ul class="list-group shadow">

                <?php
                if (!isset($_SESSION['wish'])) {
                    echo "<div style='margin-top:40px' class='container alert alert-danger'>Your wishlist is empty</div>";
                }
                else
                if (isset($_SESSION['wish']))
                    foreach ($_SESSION['wish'] as $key => $value) {
                        ?>
                        <!-- list group item-->
                        <li class="list-group-item">
                            <!-- Custom content-->
                            <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                <div class="media-body order-2 order-lg-1">
                                    <h5 class="mt-0 font-weight-bold mb-2"><?php echo $value['name']?></h5>
                                    <p class="font-italic text-muted mb-0 small"><?php echo $value['description']?></p>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="font-weight-bold my-2">$<?php echo $value['price']?></h6>

                                    </div>
                                </div>
                                <img src="<?php echo $value['image'] ?>"
                                     alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                            </div>
                            <!-- End -->
                        </li>
                        <!-- End -->
                        <?php
                    }
                ?>



                <!-- End -->

            </ul>
            <!-- End -->
        </div>
    </div>
