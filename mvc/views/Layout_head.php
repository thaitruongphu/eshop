<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo isset($page_title) ? $page_title : "Eshop"; ?></title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css for users -->
    <link href="http://localhost/eshop/mvc/libs/css/user.css" rel="stylesheet" media="screen">

</head>
<body>

<?php
include 'Navigation.php';
?>

<!-- container -->
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo isset($page_title) ? $page_title : "Eshop"; ?></h1>
            </div>
        </div>