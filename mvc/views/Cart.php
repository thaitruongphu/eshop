<?php
$page_title="Cart";
include 'Layout_head.php';
// Get status
echo "<div class='col-md-12'>";
if (strpos($_GET['url'], 'updated')) {
    echo "<div class='alert alert-info'>";
        echo "Quantity was updated.";
    echo "</div>";
} else if (strpos($_GET['url'], 'unable_to_update')) {
    echo "<div class='alert alert-danger'>";
        echo "Unable to update quantity.";
    echo "</div>";
} else if (strpos($_GET['url'], 'deleted')) {
    echo "<div class='alert alert-info'>";
        echo "Product was removed from your cart!";
    echo "</div>";
}
?>

        </div>
        <div class='col-md-12'></div>
        <?php
            foreach($data["items"] as $item) {
                echo "
                    <div class='cart-row'>
                        <div class='col-md-8'>
                            <div class='product-name m-b-10px'>
                                <h4>"; echo $item["name"]; echo "</h4>
                            </div>
                            <form class='update-quantity-form'>
                                <div class='product-id' style='display:none;'>"; echo $item["id"]; echo "</div>
                                <div class='input-group'>
                                    <input type='number' name='quantity' value='"; echo $item["quantity"]; echo "' class='form-control cart-quantity' min='1' />
                                    <span class='input-group-btn'>
                                        <button class='btn btn-default update-quantity' type='submit'>Update</button>
                                    </span>
                                </div>
                            </form>
                            <a href='http://localhost/eshop/Cart_ctr/Delete/"; echo $item["id"]; echo "' class='btn btn-default'>Delete</a>
                        </div>
                        <div class='col-md-4'>
                            <h4>$"; echo number_format($item["price"], 2, '.', ','); echo "</h4>
                        </div>
                    </div>
                ";
            }
        ?>
        <div class='col-md-8'>

        </div>
        <div class='col-md-4'>
            <div class='cart-row'>
                <h4 class='m-b-10px'>Total (<?php echo $data["item_count"]["0"] ?> items)</h4>
                <h4>$<?php echo $data["total"]["0"] ?></h4>
                <?php
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['access_level']=='Customer') {
                    if ($cart->exists()) {
                        echo "
                    <a href='http://localhost/eshop/Cart_ctr/Checkout' class='btn btn-success m-b-10px'>
                        <span class='glyphicon glyphicon-shopping-cart'></span> Proceed to Checkout
                    </a> ";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- /row -->

</div>
<!-- /container -->

<?php include 'Layout_foot.php';?>
</html>