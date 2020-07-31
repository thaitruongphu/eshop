<?php

class Home extends Controller
{
    public static function Products($page)
    {
        // Call model
        $product = Controller::model("Product");
        $product_image = Controller::model("Product_Image");
        $Cart = Controller::model("Cart");
        if(isset($_SESSION['user_id']))
        $Cart ->user_id = $_SESSION['user_id'];
        // Create product array contains all products information
        $products_arr = array();
        $products_arr["records"] = array();
        $products_arr["paging"] = array();
        $products_arr["current_page"] = array();
        $products_arr["total_pages"] = array();
        // for pagination purposes
        $page = $page ? $page : 1; // page is the current page, if there's nothing set, default is page 1
        $records_per_page = 6; // set records or rows of data per page
        $from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query LIMIT clause
        $total_rows = $product->count();
        $total_pages = ceil($total_rows / $records_per_page);
        $range = 2; // range of links to show

        // display links to 'range of pages' around 'current page'
        $initial_num = $page - $range;
        $condition_limit_num = ($page + $range) + 1;
        for ($x = $initial_num; $x < $condition_limit_num; $x++) {

            // be sure '$x is greater than 0' AND 'less than or equal to the $total_pages'
            if (($x > 0) && ($x <= $total_pages)) {
                array_push($products_arr["paging"], $x);
            }
        }
        // Add current page
        array_push($products_arr["current_page"], $page);

        // Add total pages

        array_push($products_arr["total_pages"], $total_pages);

        // Call read() function
        $read_products_stmt = $product->read($from_record_num, $records_per_page);

        // fetch the results
        while ($product_row = $read_products_stmt->fetch(PDO::FETCH_ASSOC)) {
            $product_image->product_id = $product_row['id'];
            $read_first_product_img_stmt = $product_image->readFirst();
            while ($first_product_img_row = $read_first_product_img_stmt->fetch(PDO::FETCH_ASSOC)) {
                $img = $first_product_img_row['name'];
            }
            $product_row['img'] = $img;
            array_push($products_arr["records"], $product_row);
        }

        // Call Views
        Controller::view("products", $products_arr, $Cart);
    }
    public static function Product($id){

        // Call product model
        $product = Controller::model("Product");

        // Call Cart model for checking item existed
        $Cart = Controller::model("Cart");

        // Set product id to cart
        if(isset($_SESSION['user_id']))
        $Cart ->user_id = $_SESSION['user_id'];
        $Cart ->product_id = $id;

        // Create product_arr array to store product information and product images
        $product_arr = array();
        $product_arr["product"] = array();
        $product_arr["images"] = array();

        // Set product id
        $product->id = $id;

        // Call readOne method
        $read_One_product_stmt = $product-> readOne();

        // get row values
        $product_row = $read_One_product_stmt->fetch(PDO::FETCH_ASSOC);

        // Push product information to product_arr["product"]
        array_push($product_arr["product"], $product_row);

        // Call product image model
        $product_image = Controller::model("Product_Image");

        //set product image id
        $product_image->product_id = $id;

        // read all related product image
        $product_image_stmt = $product_image->readByProductId();

        // count all relatd product image
        $num_product_image = $product_image_stmt->rowCount();

        if($num_product_image > 0){
            // loop through all product images
            while($product_images_row = $product_image_stmt->fetch(PDO::FETCH_ASSOC)){
                array_push($product_arr["images"], $product_images_row);
            }
        }
        // Call view
        Controller::view("Product", $product_arr, $Cart);
    }
}

?>