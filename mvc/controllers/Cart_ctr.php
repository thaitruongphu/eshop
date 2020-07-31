<?php

class Cart_ctr extends Controller {
    public static function Add_to_cart($id, $quantity){
        // make quantity a minimum of 1
        $quantity=$quantity<=0 ? 1 : $quantity;
        // Call cart model
        $Cart = Controller::model("Cart");
        if(isset($_SESSION['user_id']))
            $Cart ->user_id = $_SESSION['user_id'];
        $Cart ->product_id = $id;
        $Cart ->quantity = $quantity;
        // check if the item is in the cart, if it is, do not add
        if($Cart ->exists()){
            // redirect to product list and tell the user it was added to cart
            header("Location: http://localhost/eshop/Home/Product/{$id}/exist");
        }

        // else, add the item to cart
        else{
            // add to cart
            if($Cart ->create()){
                // redirect to product list and tell the user it was added to cart
                header("Location: http://localhost/eshop/Home/Product/{$id}/added");
                // Call view
            }else{
                header("Location: http://localhost/eshop/Home/Product/{$id}/unable_to_add");
            }
        }
    }
    public static function Show_cart_items(){
        // Call Cart model
        $Cart = Controller::model("Cart");
        // Set user_id
        if(isset($_SESSION['user_id']))
            $Cart ->user_id = $_SESSION['user_id'];
        // Call read_function
        $Read_stmt = $Cart->read();
        //Create items array
        $arr = array();
        $arr["total"] = array();
        $arr["item_count"] = array();
        $arr["items"] = array();
        $total = 0;
        $item_count = 0;
         while($row = $Read_stmt->fetch(PDO::FETCH_ASSOC)){
             extract($row);
             $sub_total = $price*$quantity;
             $item_count += $quantity;
             $total+=$sub_total;
             array_push($arr["items"], $row);
         }
        array_push($arr["total"], $total);
        array_push($arr["item_count"], $item_count);
        // Call cart view
        Controller::view("Cart", $arr, $Cart);
    }
    public static function Update($product_id, $quantity){
        // Call Cart model
        $Cart = Controller::model("Cart");
        // Set data for cart object
        if(isset($_SESSION['user_id']))
            $Cart ->user_id = $_SESSION['user_id'];
        $Cart->product_id = $product_id;
        $Cart->quantity = $quantity;
        // add to cart
        if($Cart->update()){
            // redirect to product list and tell the user it was added to cart
            header("Location: http://localhost/eshop/Cart_ctr/Show_cart_items/1/updated");
        }else{
            header("Location: http://localhost/eshop/Cart_ctr/Show_cart_items/1?status=unable_to_update");
        }
    }
    public static function Delete($product_id){
        // Call Cart model
        $Cart = Controller::model("Cart");
        // Set data for cart object
        if(isset($_SESSION['user_id']))
            $Cart ->user_id = $_SESSION['user_id'];
        $Cart->product_id = $product_id;
        $Cart->delete();
        header("Location: http://localhost/eshop/Cart_ctr/Show_cart_items/1/deleted");
    }
    public static function Checkout(){
        $Cart=Controller::model("Cart");
        if(isset($_SESSION['user_id']))
            $Cart ->user_id = $_SESSION['user_id'];
        $arr = array();
        $arr["total"] = array();
        $arr["item_count"] = array();
        $arr["items"] = array();
        if($Cart->count() > 0){
            $stmt=$Cart->read();
            $total=0;
            $item_count=0;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $sub_total=$price*$quantity;
                $item_count += $quantity;
                $total+=$sub_total;
                array_push($arr["items"], $row);
            }
            array_push($arr["total"], $total);
            array_push($arr["item_count"], $item_count);
            // Call checkout view
            Controller::view("Checkout", $arr, $Cart);
        }
        else{
        }
    }
    public static function Place_order($user_id){
        $Cart=Controller::model("Cart");
        if(isset($_SESSION['user_id']))
            $Cart ->user_id = $_SESSION['user_id'];
        $arr = array();
        $Cart->deleteByUser();
        // Call checkout view
        Controller::view("Place_order", $arr, $Cart);
    }
}
