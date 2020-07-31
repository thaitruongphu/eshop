<?php
// set page title
$page_title="Products";
include 'Layout_head.php';
?>

        <?php
        foreach($data["records"] as $product){
            echo "
                    <div class='col-md-4 m-b-20px'>
                        <div class='product-id display-none'>";  echo $product["id"]; echo "</div>
                        <a href='http://localhost/eshop/Home/Product/"; echo $product["id"]; echo "' class='product-link'>
                            <div class='m-b-10px'><img src='http://localhost/eshop/mvc/uploads/images/"; echo $product["img"]; echo "' class='w-100-pct'/></div>
                            <div class='product-name m-b-10px'>"; echo $product["name"]; echo "</div>
                        </a>
                        <div class='m-b-10px'>"; echo $product["price"]; echo "</div>";
                        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['access_level']=='Customer') {
                            // Set product id to cart
                            $cart->user_id = $_SESSION['user_id'];
                            $cart->product_id = $product["id"];
                            // If item already exists in cart, we do not show the add to cart button
                            if (!$cart->exists()) {
                                echo "<div class='m-b-10px'><a href='http://localhost/eshop/Cart_ctr/Add_to_cart/";
                                echo $product["id"];
                                echo "/1' class='btn btn-primary w-100-pct'>Add to Cart</a></div>";
                            } else {
                                echo "<a href='http://localhost/eshop/Cart_ctr/Show_cart_items' class='btn btn-success w-100-pct'>";
                                echo "Update Cart";
                                echo "</a>";
                            }
                        }
                    echo "</div>";
        }
        ?>
        <div class='col-md-12'>
            <ul class='pagination m-b-20px m-t-0px'>
                <?php
                // button for first page
                if($data["current_page"]["0"]>1){
                    echo "<li><a href='http://localhost/eshop/Home/Products/"; echo $data["paging"]["0"]; echo "' title='Go to the first page.'>First Page </a></li>";
                }
                foreach($data["paging"] as $paging){
                    if($paging == $data["current_page"]["0"]){
                        echo "<li class='active'><a href=\"#\"> "; echo $paging; echo " <span class=\"sr-only\">(current)</span></a></li>";
                    }
                    else {
                        echo "<li><a href='http://localhost/eshop/Home/Products/"; echo $paging; echo "'>"; echo $paging; echo " </a></li>";
                    }

                }
                if($data["current_page"]["0"] < $data["total_pages"]["0"]){
                    echo "<li><a href='http://localhost/eshop/Home/Products/"; echo $data["total_pages"]["0"]; echo "' title='Last page is "; echo $data["total_pages"]["0"]; echo ".'>Last Page</a></li>";
                }
                ?>

            </ul>
        </div>
    </div>
    <!-- /row -->

</div>
<!-- /container -->
<?php include 'Layout_foot.php'; ?>
</body>
</html>