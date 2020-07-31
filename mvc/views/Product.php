<?php
$page_title=$data["product"]["0"]["name"];
include 'Layout_head.php';
// Get status
$status = isset($_GET['url']) ? $_GET['url'] : "";
echo "<div class='col-md-12'>";
if (strpos($_GET['url'], 'added')) {
    echo "<div class='alert alert-info'>";
        echo "Product was added to your cart!";
    echo "</div>";
} else if (strpos($_GET['url'], 'unable_to_add')) {
    echo "<div class='alert alert-info'>";
        echo "Unable to add product to cart. Please contact Admin.";
    echo "</div>";
}
?>
        </div>
        <div class='col-md-12'></div>
        <div class='col-md-1'>
            <?php
                foreach($data["images"] as $image) {
                    echo " <img src = 'http://localhost/eshop/mvc/uploads/images/"; echo $image["name"]; echo " ' class='product-img-thumb' data-img-id='"; echo $image["id"]; echo "' />";
                }
            ?>
        </div>
        <div class='col-md-4' id='product-img'>
            <?php
            $x = 0;
            foreach($data["images"] as $image) {
                $show_product_img = $x == 0 ? "display-block" : "display-none";
                echo " 
                       <a href='http://localhost/eshop/mvc/uploads/images/"; echo $image["name"]; echo "' target='_blank' id='product-img-"; echo $image["id"]; echo "' class='product-img "; echo $show_product_img; echo "'>
                            <img src='http://localhost/eshop/mvc/uploads/images/"; echo $image["name"]; echo "' style='width:100%;'/>
                       </a> ";
                $x++;
            }
            ?>

        </div>
        <div class='col-md-5'>
            <div class='product-detail'>Price:</div>
            <h4 class='m-b-10px price-description'> <?php echo "$ ". number_format($data["product"]["0"]["price"], 2, '.', ','); ?> </h4>
            <div class='product-detail'>Product description:</div>
            <div class='m-b-10px'> <?php echo htmlspecialchars_decode(htmlspecialchars_decode($data["product"]["0"]["description"])); ?> </div>
            <div class='product-detail'>Product category:</div>
            <div class='m-b-10px'></div>
        </div>
        <div class='col-md-2'>
            <?php
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['access_level']=='Customer') {
                    // if product was already added in the cart
                    if ($cart->exists()) {
                        echo "<div class='m-b-10px'>This product is already in your cart.</div>";
                        echo "<a href='http://localhost/eshop/Cart_ctr/Show_cart_items' class='btn btn-success w-100-pct'>";
                        echo "Update Cart";
                        echo "</a>";
                    } // if product was not added to the cart yet
                    else {
                        echo "<form class='add-to-cart-form'>";
                            // product id
                            echo "<div class='product-id display-none'>{$data["product"]["0"]["id"]}</div>";
                            // select quantity
                            echo "<div class='m-b-10px f-w-b'>Quantity:</div>";
                            echo "<input type='number' class='form-control m-b-10px cart-quantity' value='1' min='1' />";
                            // enable add to cart button
                            echo "<button style='width:100%;' type='submit' class='btn btn-primary add-to-cart m-b-10px'>";
                                echo "<span class='glyphicon glyphicon-shopping-cart'></span> 
                                            Add to cart";
                            echo "</button>";
                        echo "</form>";
                    }
                }
            ?>
        </div>
    <!-- /row -->

</div>
<!-- /container -->
<?php include 'Layout_foot.php';?>
</body>
</html>