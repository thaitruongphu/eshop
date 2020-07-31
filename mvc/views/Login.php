<?php
// set page title
$page_title = "Login";

// include page header HTML
include_once "layout_head.php";

echo "
<div class='col-sm-6 col-md-4 col-md-offset-4'>";

    // tell the user he is not yet logged in
    if(strpos($_GET['url'], 'not_yet_logged_in')){
        echo "<div class='alert alert-danger margin-top-40' role='alert'>Please login.</div>";
    }

    // tell the user to login
    else if(strpos($_GET['url'], 'please_login')){
        echo "
            <div class='alert alert-info'>
                <strong>Please login to access that page.</strong>
            </div>";
    }

// tell the user email is verified
else if(strpos($_GET['url'], 'email_verified')){
    echo "
        <div class='alert alert-success'>
            <strong>Your email address have been validated.</strong>
        </div>";
}

// tell the user if access denied
/*if($access_denied){
    echo "<div class='alert alert-danger margin-top-40' role='alert'>
        Access Denied.<br /><br />
        Your username or password maybe incorrect
    </div>";
}*/

    // actual HTML login form
    echo "<div class='account-wall'>";
        echo "<div id='my-tab-content' class='tab-content'>";
            echo "<div class='tab-pane active' id='login'>";
                echo "<img class='profile-img' src='http://localhost/eshop/mvc/images/login-icon.png'>";
                echo "<form class='form-signin' action='http://localhost/eshop/User_ctr/Login' method='post'>";
                    echo "<input type='text' name='email' class='form-control' placeholder='Email' required autofocus />";
                    echo "<input type='password' name='password' class='form-control' placeholder='Password' required />";
                    echo "<input type='submit' class='btn btn-lg btn-primary btn-block' value='Log In' />";
                echo "</form>";
            echo "</div>";
        echo "</div>";
    echo "</div>";

echo "</div>";

// footer HTML and JavaScript codes
include_once "layout_foot.php";
?>
