<?php
$page_title="Checkout";
include 'Layout_head.php';
?>
        <?php
        foreach($data["items"] as $item){
            echo "
                    <div class='cart-row'>
                        <div class='col-md-8'>
                            <div class='product-name m-b-10px'>
                                <h4>"; echo $item["name"]; echo "</h4>
                            </div>";
                                echo $item["quantity"] > 1 ? "<div>{$item["quantity"]} items</div>" : "<div>{$item["quantity"]} item</div>" ; echo "          
                        </div>
                        <div class='col-md-4'>
                            <h4>$"; echo $item["subtotal"]; echo "</h4>
                        </div>
                    </div>
                ";
        }
        ?>
        <div class='col-md-12 text-align-center'>
            <div class='cart-row'>
                <h4 class='m-b-10px'>Total (<?php echo $data["item_count"]["0"] > 1 ? "{$data["item_count"]["0"]} items" : "{$data["item_count"]["0"]} item" ; ?>)</h4>
                <h4>$ <?php echo $data["total"]["0"]; ?> </h4>
                <a href='http://localhost/eshop/Cart_ctr/Place_order' class='btn btn-lg btn-success m-b-10px'>
                    <span class='glyphicon glyphicon-shopping-cart'></span> Place Order
                </a>
            </div>
        </div>
    </div>
    <!-- /row -->

</div>
<!-- /container -->

<?php include 'Layout_foot.php'; ?>
</body>
</html>