<?php
class User_ctr extends Controller
{
    public static function Login($action)
    {
        $user = Controller::model("User");
        if(!$_POST)
        Controller::login_view("Login",$action, $user);
        // if the login form was submitted
        if($_POST){
            // check if email and password are in the database
            $user->email=$_POST['email'];

            // check if email exists, also get user details using this emailExists() method
            $email_exists = $user->emailExists();

            // validate login
            if ($email_exists && password_verify($_POST['password'], $user->password) && $user->status==1){

                // if it is, set the session value to true
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $user->id;
                $_SESSION['access_level'] = $user->access_level;
                $_SESSION['firstname'] = htmlspecialchars($user->firstname, ENT_QUOTES, 'UTF-8') ;
                $_SESSION['lastname'] = $user->lastname;

                // if access level is 'Admin', redirect to admin section
                if($user->access_level=='Admin'){
                    header("Location: {$home_url}admin/index.php?action=login_success");
                }

                // else, redirect only to 'Customer' section
                else{
                    header("Location: http://localhost/eshop/Home/Products/1/login_success");
                }
            }

            // if username does not exist or password is wrong
            else{
                $access_denied=true;
            }
        }
    }

    public static function Logout(){
        // destroy session, it will remove ALL session settings
        session_destroy();

        //redirect to login page
        header("Location: http://localhost/eshop/Home/Products/1");
    }
}