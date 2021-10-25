
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="../HTML%20Template/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../HTML%20Template/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../HTML%20Template/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../HTML%20Template/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../HTML%20Template/css/main.css" rel="stylesheet" media="all">
</head>

<!-- Shopping cart section  -->
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['delete-cart-submit'])){
            $deletedrecord = $Cart->deleteCart($_POST['item_id']);
        }

        // save for later
        if (isset($_POST['wishlist-submit'])){
            $Cart->saveForLater($_POST['item_id']);
        }
    }
?>

<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                    foreach ($product->getData('cart') as $item) :
                        $cart = $product->getProduct($item['item_id']);
                        $subTotal[] = array_map(function ($item){
                ?>
                <!-- cart item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $item['item_image'] ?? "./assets/products/1.png" ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Unknown"; ?></h5>
                        <small>by <?php echo $item['item_brand'] ?? "Brand"; ?></small>
                        <!-- product rating -->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                        </div>
                        <!--  !product rating-->

                        <!-- product qty -->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-rale w-25">
                                <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                <input type="text" data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                <button data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>

                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                            </form>

                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="wishlist-submit" class="btn font-baloo text-danger">Save for Later</button>
                            </form>


                        </div>
                        <!-- !product qty -->

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            $<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $item['item_price'] ?? 0; ?></span>
                        </div>
                    </div>
                </div>
                <!-- !cart item -->
                <?php
                            return $item['item_price'];
                        }, $cart); // closing array_map function
                    endforeach;
                ?>
            </div>
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span> </span> </h5>
<!--                        <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>-->

                        <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
                            <div class="wrapper wrapper--w680">
                                <div class="card card-4">
                                    <div class="card-body">
                                        <h2 class="title">Order Form</h2>
                                        <form method="POST">
                                            <div class="row row-space">
                                                <div>
                                                    <div class="input-group">
                                                        <label class="label col-4">First name</label>
                                                        <input class="input--style-4 col-8" type="text" name="first_name">
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="input-group">
                                                        <label class="label col-4">Last name</label>
                                                        <input class="input--style-4 col-8" type="text" name="last_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-space">
                                                <div>
                                                    <div class="input-group">
                                                        <label class="label col-4">Email Address</label>
                                                        <input class="input--style-6 col-8" type="email" name="email">
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="input-group">
                                                        <label class="label col-5">Gender</label>
                                                        <div class="p-t-10 col-7">
                                                            <label class="radio-container m-r-45">Male
                                                                <input type="radio" checked="checked" name="gender">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                            <label class="radio-container">Female
                                                                <input type="radio" name="gender">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-space">
                                                <div>
                                                    <div class="input-group">
                                                        <label class="label col-4">Address</label>
                                                        <input class="input--style-4 col-8" type="email" name="address">
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="input-group">
                                                        <label class="label col-6">Phone Number</label>
                                                        <input class="input--style-4 col-6" type="text" name="phone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <label class="label col-6">Payment method</label>
                                                <div class="rs-select2 js-select-simple select--no-search">
                                                    <select name="subject col-6">
                                                        <option disabled="disabled" selected="selected">Choose option</option>
                                                        <option>COD</option>
                                                        <option>VNPay</option>
                                                    </select>
                                                    <div class="select-dropdown"></div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="Template/payingForm.php" class="btn btn-warning mt-3" >Proceed to Buy</a>
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>
</section>
<!-- !Shopping cart section  -->

<!-- Jquery JS-->
<script src="../HTML%20Template/vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="../HTML%20Template/vendor/select2/select2.min.js"></script>
<script src="../HTML%20Template/vendor/datepicker/moment.min.js"></script>
<script src="../HTML%20Template/vendor/datepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="../HTML%20Template/js/global.js"></script>