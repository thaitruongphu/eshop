<!-- navbar -->
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://localhost/eshop/Home/Products/">E store</a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

                <!-- highlight if $page_title has 'Products' word. -->
                <li class='active'>
                    <a href="http://localhost/eshop/Home/Products/">Products</a>
                </li>
                <?php
                    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['access_level']=='Customer') {
                        if (isset($cart)) {
                            echo "
                                <li>
                                    <a href='http://localhost/eshop/Cart_ctr/Show_cart_items'>
                                        Cart <span class='badge' id='comparison-count'>";
                                            echo $cart->count();
                                        echo "</span>
                                        </a>
                                </li>";
                        }
                    }
                ?>
            </ul>

            <?php
            // check if users / customer was logged in
            // if user was logged in, show "Edit Profile", "Orders" and "Logout" options
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['access_level']=='Customer'){
            ?>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                        // if login was successful
                        if(strpos($_GET['url'], 'login_success')){
                        echo "<div class='alert alert-info'>";
                            echo "<strong>Hi " . $_SESSION['firstname'] . ", welcome back!</strong>";
                            echo "</div>";
                        }
                    ?>
                    <li <?php echo $page_title=="Edit Profile" ? "class='active'" : ""; ?>>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <?php echo $_SESSION['firstname']; ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="http://localhost/eshop/User_ctr/Logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <?php
            }

            // if user was not logged in, show the "login" and "register" options
            else{
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li <?php echo $page_title=="Login" ? "class='active'" : ""; ?>>
                        <a href="http://localhost/eshop/User_ctr/Login/">
                            <span class="glyphicon glyphicon-log-in"></span> Log In
                        </a>
                    </li>

                    <li <?php echo $page_title=="Register" ? "class='active'" : ""; ?>>
                        <a href="http://localhost/eshop/Home/Products/">
                            <span class="glyphicon glyphicon-check"></span> Register
                        </a>
                    </li>
                </ul>
                <?php
            }
            ?>

        </div><!--/.nav-collapse -->

    </div>
</div>
<!-- /navbar -->
